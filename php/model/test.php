<?php

include_once("manager.php");
include_once("usertype/usertypemanager.php");
include_once("usertype/usertype.php");

$utm = new UserTypeManager();
$ut = $utm->getUserTypeById(1);
echo $ut->getName();
?>