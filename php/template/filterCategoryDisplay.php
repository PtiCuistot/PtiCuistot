<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nos Recettes</title>
    <?php include('link.php'); ?>
</head>
<?php include('header.php'); ?>
<?php include ('../database/connector.php')?>
<?php include ('../model/manager.php')?>
<?php include ('../model/category/categorymanager.php')?>
<?php include('popup.php'); ?>

    <?php
    include_once("../model/recipe/recipeManager.php");

    $categoryID = $_POST["email_input"];

    $rm = new RecipeManager();

    foreach ($rm->getRecipeByCategory($categoryID) as $recipe) {
        echo '
        <div id="DivRecipe0" class="col-xl-3 col-lg-4 col-md-6 mb-4 fade-in show" style="display: none;">
        <div class="RecipFirstChild bg-white rounded shadow-sm" style="border: 1px solid black;">
            <img src="' . $recipe->getImage() . '" alt="" class="RecipeImg img-fluid card-img-top">
            <div class="RecipeDiv p-4">
                <h5><a href="recipe.php?id='.$recipe->getId().'" class="RecipeTitle text-dark">' . $recipe->getTitle() . '</a></h5>
                <!-- <b>By : ' . $rm->getUserById($recipe->getUserId())->getUsername() . '</b> -->
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


<?php include_once('footer.php'); ?>