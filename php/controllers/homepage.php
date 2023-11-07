<?php 

function homepage() 
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    include_once("php/database/connector.php");
    include_once("php/model/manager.php");
    include_once("php/model/category/categorymanager.php");
    include_once("php/model/ingredient/ingredientmanager.php");
    include_once("php/model/user/usermanager.php");
    include_once("php/model/user/user.php");
    include_once("php/model/recipe/recipemanager.php");
    include_once("php/model/recipe/recipe.php");



    require('php/template/index.php');


}

?>