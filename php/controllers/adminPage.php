<?php
function adminPage()
{
    include_once("php/database/connector.php");
    include_once("php/model/manager.php");
    include_once("php/model/user/usermanager.php");
    include_once("php/model/user/user.php");
    include_once("php/model/ingredient/ingredient.php");
    include_once("php/model/ingredient/ingredientmanager.php");

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