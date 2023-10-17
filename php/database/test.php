<?php

include '../model/usermanager.php';
include '../model/user.php';

$um = new UserManager();
$u = $um->getUserById(1);
$u->setFirstname("Antoine");
echo $u->getFirstname();
$um->updateUser($u);

?>