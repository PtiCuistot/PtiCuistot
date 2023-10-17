<?php

include '../model/usermanager.php';
include '../model/user.php';

$u = new User("Cyprien", "cypjeu@gmail.com", "jezkfnkznfeznf");
$um = new UserManager();
$um->insertUser($u);

?>