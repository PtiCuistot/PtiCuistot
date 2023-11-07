<?php
function register() 
{

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    include_once("php/database/connector.php");
    include_once("php/model/manager.php");
    include_once("php/model/user/usermanager.php");
    include_once("php/model/user/user.php");

    return require("php/template/registration.php");
}
?>