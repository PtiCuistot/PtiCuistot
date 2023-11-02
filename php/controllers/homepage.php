<?php 

function homepage() 
{
    include_once("php/database/connector.php");
    include_once("php/model/manager.php");
    include_once("php/model/user/usermanager.php");
    include_once("php/model/user/user.php");
    include_once("php/model/category/categorymanager.php");
    include_once("php/model/ingredient/ingredientmanager.php");
    $_SESSION['admin'] = true; //TODO : Changer ce paramètre en attendant la connexion 
    $_SESSION['userId'] = 1; //TODO : Changer quand page de connexion faîtes !
    require('php/template/index.php');
}

?>