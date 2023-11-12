<?php 

session_start();

include_once("../database/connector.php");
include_once("../model/manager.php");
include_once("../model/user/user.php");
include_once("../model/user/usermanager.php");

$um = new UserManager(); 
$user = $um->getUserById(intval($_SESSION['userId']));

if(password_verify($_POST['actualPwd'], $user->getPassword()))
{
    
    $user->setPassword(password_hash($_POST['newPwd'], PASSWORD_DEFAULT));
    $um->updateUser($user);
}

header('Location: ../../account.php');
?>