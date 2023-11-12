<?php


function accountPage()
{

    include_once("php/database/connector.php");
    include_once("php/model/manager.php");
    include_once("php/model/user/usermanager.php");
    include_once("php/model/user/user.php");
    include_once("php/model/recipe/recipe.php");
    include_once("php/model/recipe/recipemanager.php"); 


    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    if(isset($_SESSION['userId']))
    {

        $um = new UserManager(); 
        $user = $um->getUserById($_SESSION['userId']);
        
        
        return include("php/template/user.php"); 
    }
    else 
    {
        return include('php/template/login.php');
             
    }
}

?>