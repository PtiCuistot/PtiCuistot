<?php

session_start();

if (!(session_status() === PHP_SESSION_NONE))
{
    unset($_SERVER['userId']);
    unset($_SESSION['admin']); 
    session_destroy();
    header('Location: ../../index.php');
}
header('Location: ../../index.php');


?>