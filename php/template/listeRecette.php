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


                if(isset($_GET['limit']))
                {
                    $limit = intval($_GET['limit']);
                }
                else 
                {
                    $limit = 10;
                }

                foreach ($rm->getRecipes() as $recipe) {
                    echo '
                    <div id="DivRecipe0" class="col-xl-3 col-lg-4 col-md-6 mb-4 fade-in show" style="">
                        <div class="RecipFirstChild bg-white rounded shadow-sm" style="border: 1px solid black;">
                            <img src="' . $recipe->getImage() . '" alt="" class="RecipeImg img-fluid card-img-top">
                            <div class="RecipeDiv p-4">
                                <h5><a href="#" class="RecipeTitle text-dark">' . $recipe->getTitle() . '</a></h5>
                                <b>By : ' . $um->getUserById($recipe->getUserId())->getUsername() . '</b>
                                <div class="d-flex align-items-center justify-content-between rounded-pill bg-light px-3 py-2 mt-4">
                                    <p class="small mb-0">
                                        <i class="fa-solid fa-star" style="var(--blue);"></i>
                                        <i class="fa-solid fa-star" style="var(--blue);"></i>
                                        <i class="fa-solid fa-star" style="var(--blue);"></i>
                                        <i class="fa-regular fa-star" style="var(--blue);"></i>
                                        <i class="fa-regular fa-star" style="var(--blue);"></i>
                                        <span class="font-weight-bold">Hard</span>
                                    </p>
                                    <div class="badge badge-danger px-3 rounded-pill font-weight-normal text-dark" style="color: red !important;">New</div>
                                </div>
                            </div>
                        </div>
                    </div>';
                }
                ?>
            </div>

            <div class="py-5 text-right"><a href="recipe.php?limit=<?php echo $limit+20?>" class="btn btn-dark px-5 py-3 text-uppercase" id="ButtonShowMoreRecipe">Show me more</a></div>
        </div>
    </div>
</form>
<?php include_once('footer.php'); ?>
