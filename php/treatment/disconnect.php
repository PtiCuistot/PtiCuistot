<?php

if (!(session_status() === PHP_SESSION_NONE))
{
    unset($_SERVER['userId']);
    unset($_SESSION['admin']); 
}

?>