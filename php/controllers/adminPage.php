<?php
function adminPage()
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    include_once("php/database/connector.php");
    include_once("php/model/manager.php");
    include_once("php/model/user/usermanager.php");
    include_once("php/model/user/user.php");
    include_once("php/model/recipe/recipe.php");
    include_once("php/model/recipe/recipemanager.php");
    include_once("php/model/comment/comment.php");
    include_once("php/model/comment/commentmanager.php");

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    

    if(isset($_SESSION['admin']))
    {
        return include("php/template/admin.php"); 
    }
    else
    {
        return include("php/template/403.php");
    }

}
?>