<?php 

function homepage() 
{
    include_once("php/database/connector.php");
    include_once("php/model/manager.php");
    include_once("php/model/user/usermanager.php");
    include_once("php/model/user/user.php");
    include_once("php/model/recipe/recipemanager.php");
    include_once("php/model/recipe/recipe.php");

    require('php/template/index.php');
}

?>