<?php

include_once("user/usermanager.php");
include_once("user/user.php");

$usermanager = new UserManager();
$myUser = $usermanager->checkPassword("clement.baratin@etu.unicaen.fr", "tata"); 
echo $myUser->getUsername();
?>