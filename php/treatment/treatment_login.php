<?php

    include_once("../model/manager.php");
    include_once("../model/user/usermanager.php");
    include_once("../model/user/user.php");

    $email = $_POST["email_input"];
    $password = $_POST["password_input"];

    $um = new UserManager();
    $user = $um->getUserByMail($email);

    if ($user != NULL) {
        if (password_verify($password, $user->getPassword())) {
            session_start();
            $_SESSION['userId'] = $user->getId();
            header('Location: https://dev-baratin221.users.info.unicaen.fr/PtiCuistot/php/template/');
        }
        else {
            echo "can't connect";
        }
    }

?>
