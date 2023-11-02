<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nos Recettes</title>
    <?php include('link.php'); ?>
    <link rel="stylesheet" href="../../assets/mdb/css/mdb.min.css" />
    <link rel="stylesheet" href="../../assets/styles/style.css">
    <link rel="stylesheet" href="../../assets/styles/NavBar.css">
</head>
<?php 
    include_once('header.php'); 
    include_once ('../database/connector.php');
    include_once ('../model/manager.php');
    include_once ('../model/category/categorymanager.php');
    include_once ('../model/recipe/recipe.php');
    include_once("../model/recipe/recipemanager.php");
    include_once("../model/user/user.php");
    include_once("../model/user/usermanager.php");
    include_once('popup.php'); 
?>
    <div class="row" id="row">
    <?php
    $categoryID = $_POST["category"];
    $categoryID = intval($categoryID);
    $cm = new CategoryManager();

    // echo "ID_input: ".$categoryID."<br>";
    $category = $cm->getCategoryById($categoryID);
    // echo "titre categorie(ID): ".$category->getTitle()."(".$category->getId().")<br>";
    // echo "description categorie: ".$category->getDescription()."<br>";
    $rm = new RecipeManager();
    $um = new UserManager();

    // $test = $rm->getRecipeByCategory($category);
    // echo "NB recette: ".count($test)."<br>";

    foreach ($rm->getRecipeByCategory($category) as $recipe) {
        echo '
        <div id="DivRecipe0" class="col-xl-3 col-lg-4 col-md-6 mb-4 fade-in show">
        <div class="RecipFirstChild bg-white rounded shadow-sm" style="border: 1px solid black;">
            <img src="' . $recipe->getImage() . '" alt="" class="RecipeImg img-fluid card-img-top">
            <div class="RecipeDiv p-4">
                <h5><a href="../../recipe.php?id='.$recipe->getId().'" class="RecipeTitle text-dark">' . $recipe->getTitle() . '</a></h5>
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


<?php include_once('footer.php'); ?>