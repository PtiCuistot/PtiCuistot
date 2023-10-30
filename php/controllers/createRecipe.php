<?php

function createRecipe() 
{
    include_once("php/database/connector.php");
    include_once("php/model/manager.php");
    include_once("php/model/user/usermanager.php");
    include_once("php/model/user/user.php");
    include_once("php/model/category/category.php");
    include_once("php/model/category/categorymanager.php");
    include_once("php/model/ingredient/ingredient.php");
    include_once("php/model/ingredient/ingredientmanager.php");


    if(!isset($_SESSION))
    {
        session_start();
        $_SESSION['userId'] = 1; //TODO : Changer

    }

    if(isset($_SESSION['userId']))
    {
        require('php/template/creationRecette.php');
    }
    else
    {
        require('php/template/login.php');
    }

}

?>