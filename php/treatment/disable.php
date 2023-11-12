<?php

session_start();

include_once("../database/connector.php");
include_once("../model/manager.php");
include_once("../model/user/user.php");
include_once("../model/user/usermanager.php");

$um = new UserManager(); 
$user = $um->getUserById(intval($_SESSION['userId']));
$user->setStatut(0); 
$um->updateUser($user);

unset($_SERVER['userId']);
unset($_SESSION['admin']); 
session_destroy();
header('Location: ../../index.php');

?>