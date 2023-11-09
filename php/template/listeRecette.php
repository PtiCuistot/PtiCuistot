<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Liste des recettes</title>
    <?php include('link.php'); ?>
</head>
<?php include('header.php'); ?>
<form action="../treatment/treatment_recipe.php" id="recipeForm" method="POST">
    <div class="container-fluid">
        <div class="px-lg-5">
            <div class="row py-5">
                <div class="col-lg-12 mx-auto" style="color: white;">
                    <div class="p-5 shadow-sm rounded banner">
                        <h1 class="display-4">Nos Recettes</h1>
                        <p class="lead">Voici une liste de toutes nos recettes</p>
                        <p class="small">Classé de la plus récente a la plus ancienne</p>
                    </div>
                </div>
            </div>

            <div class="row" id="row">
                <?php

                $rm = new RecipeManager();
                $um = new UserManager();

                $limit = 10;

                if (isset($_GET['limit'])) {
                    $limit = intval($_GET['limit']);
                }


                foreach ($rm->getRecipes($limit) as $recipe) {
                    $notes = $recipe->getNote();
                    $solidStars = min($notes, 5);
                    $regularStars = 5 - $solidStars;

                    echo '
                    <div id="DivRecipe0" class="col-xl-3 col-lg-4 col-md-6 mb-4 fade-in show" style="display: none;">
                        <a href="recipe.php?id=' . $recipe->getId() . '" class="aListRecip" style="text-decoration: none; color: inherit;">
                            <div class="RecipFirstChild bg-white rounded shadow-sm" style="border: 1px solid black;">
                                <img src="' . $recipe->getImage() . '" alt="" class="RecipeImg img-fluid card-img-top">
                                <div class="RecipeDiv p-4">
                                    <h5><a href="recipe.php?id=' . $recipe->getId() . '" class="RecipeTitle text-dark">' . $recipe->getTitle() . '</a></h5>
                                    <b>By : ' . $um->getUserById($recipe->getUserId())->getUsername() . '</b>
                                    <div class="d-flex align-items-center justify-content-between rounded-pill bg-light px-3 py-2 mt-4">
                                        <p class="small mb-0">';

                                        for ($i = 0; $i < $solidStars; $i++) {
                                            echo '<i class="fa-solid fa-star" style="var(--blue);"></i>';
                                        }

                                        for ($i = 0; $i < $regularStars; $i++) {
                                            echo '<i class="fa-regular fa-star" style="var(--blue);"></i>';
                                        }
                                        
                                        $difficulty = '';
                                        switch ($notes) {
                                            case 1:
                                                $difficulty = 'Très Simple';
                                                break;
                                            case 2:
                                                $difficulty = 'Simple';
                                                break;
                                            case 3:
                                                $difficulty = 'Moyen';
                                                break;
                                            case 4:
                                                $difficulty = 'Difficile';
                                                break;
                                            case 5:
                                                $difficulty = 'Très Difficile';
                                                break;
                                            default:
                                                $difficulty = '';
                                        }
                                        echo '<span class="font-weight-bold">' . $difficulty . '</span></p>';
                                        $tags = $rm->getTag($recipe);
                                        foreach ($tags as $tag) {
                                            echo '<div class="badge badge-danger px-3 rounded-pill font-weight-normal text-dark" style="color: red !important;">' . $tag->getContent() . '</div>';
                                        }
                                        echo '
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>';
                }
                ?>

            </div>

            <div class="py-5 text-right">
                <a href="recipe.php?limit=<?php echo $limit + 20 ?>" class="btn btn-dark px-5 py-3 text-uppercase" id="ButtonShowMoreRecipe">Voir plus</a>
                <a href="recipe.php?action=create" class="btn btn-info px-5 py-3 text-uppercase" id="CreateRecipeLinkButton">Créer une recette</a>
            </div>
        </div>
    </div>
</form>
<script src="assets/scripts/scriptRecipe.js"></script>
<?php include_once('footer.php'); ?>