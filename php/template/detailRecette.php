<?php if ($recipe != null) : ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <?php
        if ($recipe != null) {
            echo '<title>' . $recipe->getTitle() . '</title>';
        }
        ?>
        <?php include('link.php'); ?>
    </head>
    <?php include('header.php'); ?>
    <section style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="card rounded-3" style="text-align: center;">
                    <div class="card-body p-4">
                        <h1 class="display-3 RecipeTitle"><?php echo $recipe->getTitle(); ?></h1>
                        <img src="<?php echo $recipe->getImage(); ?>" height="650px" class="imgRecipeDisplay" alt="Image de la recette">
                        <h2 class="h2Recipe"><i>Une recette de <?php echo $um->getUserById($recipe->getUserId())->getUsername(); ?></i></h2>
                        <p>Dernière Mise à jour : <?php echo $recipe->getUpdated()->format('d/m/Y') ?> </p>
                        <div class="container">
                            <h2 class="h2Recipe">Liste des ingrédients</h2>
                            <table class="table mb-4" id="ingredientArrayGlobal">
                                <thead>
                                    <tr>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Quantité</th>
                                        <th scope="col">Unités</th>
                                    </tr>
                                </thead>
                                <tbody id="ingredientArray">
                                    <?php
                                    foreach ($rm->getRecipeIngredients($recipe) as $row) {
                                        echo '
                                        <tr>
                                            <td>' . $row['ing_name'] . '</td>
                                            <td>' . $row['iw_weight'] . '</td>
                                            <td>' . $row['iw_unity'] . '</td>
                                        </tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>

                            <h2 class="h2Recipe">Recette</h2>
                            <div class="bg-white rounded shadow-sm p-4" style="border: 1px solid black;">
                                <p class="RecipeContent"><?php echo $recipe->getContent(); ?></p>
                            </div>
                        </div>


                        <?php if (intval($_SESSION['userId']) == intval($recipe->getUserId())) : ?>
                            <h2 class="h2Recipe">Action créateur</h2>
                            <form>
                                <input name='recipeId' value="<?php echo $recipe->getId() ?>" hidden>
                                <input class="btn btn-success" type="submit" value="Mettre à jour ma recette">
                            </form>
                        <?php endif; ?>

                        <?php if (isset($_SESSION['admin']) && $recipe->getValidate() == 0) : ?>
                            <h2 class="h2Recipe">Action Administrateur</h2>
                            <form method="POST" action="php/treatment/accept_recipe.php">
                                <input name='recipeId' value="<?php echo $recipe->getId() ?>" hidden>
                                <input class="btn btn-success" type="submit" value="Valider la recette">
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include('footer.php'); ?>
<?php else: ?>
    <?php include('404.php'); ?>
<?php endif; ?>