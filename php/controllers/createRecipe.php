<?php

function createRecipe() 
{
    include_once("php/database/connector.php");
    include_once("php/model/manager.php");
    include_once("php/model/user/usermanager.php");
    include_once("php/model/user/user.php");
    include_once("php/model/category/category.php");
    include_once("php/model/category/categorymanager.php");


    require('php/template/creationRecette.php');
}

?>