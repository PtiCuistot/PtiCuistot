<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Liste des recettes</title>
        <?php include('link.php'); ?>
    </head>
        <?php include('header.php');?>
            <form action="../treatment/treatment_recipe.php" id="recipeForm" method="POST">
                <h1>Liste des recettes</h1>
                <?php

                
                    $rm = new RecipeManager(); 
                    $um = new UserManager();

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

            <div class="py-5 text-right"><a href="#" class="btn btn-dark px-5 py-3 text-uppercase" id="ButtonShowMoreRecipe">Show me more</a></div>
        </div>
    </div>
</form>
<?php include_once('footer.php'); ?>
