<?php

function cat_show_result()
{
    include_once('php/database/connector.php');
    include_once('php/model/manager.php');
    include_once('php/model/ingredient/ingredientmanager.php');
    include_once('php/model/category/categorymanager.php');
    include_once('php/model/recipe/recipe.php');
    include_once("php/model/recipe/recipemanager.php");
    include_once("php/model/user/user.php");
    include_once("php/model/user/usermanager.php");
    
    $categoryID = $_POST["category"];
    $categoryID = intval($categoryID);
    
    $cm = new CategoryManager();
    
    $category = $cm->getCategoryById($categoryID);
    
    $rm = new RecipeManager();
    $um = new UserManager();
    
    include_once("php/template/filterCategoryDisplay.php");
}



?>
