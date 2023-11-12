<?php

    include_once("../database/connector.php");
    include_once("../model/manager.php");
    include_once("../model/user/usermanager.php");
    include_once("../model/user/user.php");

    $email = $_POST["email_input"];
    $password = $_POST["password_input"];

    $um = new UserManager();
    $user = $um->getUserByMail($email);

    if ($user != NULL) {
        if (password_verify($password, $user->getPassword()) && ($user->getStatut() == 1)) {
            session_start();
            $_SESSION['userId'] = $user->getId();
            if($user->getAccountType()==2)
            {
                $_SESSION['admin'] = true;
            }
            header('Location: ../../index.php');
        }
        else {
            echo "can't connect";
        }
    }

?>

