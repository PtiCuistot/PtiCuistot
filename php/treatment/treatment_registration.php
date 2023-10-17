<?php 
    $pseudo = $_POST["pseudo_input"];
    $firstname = $_POST["firstname_input"];
    $lastname = $_POST["lastname_input"];
    $email = $_POST["email_input"];
    $password = $_POST["password_input"];
    $passwordConfirm = $_POST["passwordConfirm_input"];

    $reg = '/^([a-zA-Z])+$/';
    $text = "jèanmi";

    if (preg_match($reg, $text)){
        echo "text valide";
    }else{
        echo "text invalide";
    }

?>