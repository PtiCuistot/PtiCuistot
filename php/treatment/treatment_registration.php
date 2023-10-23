<?php 
    $pseudo = $_POST["pseudo_input"];
    $firstname = $_POST["firstname_input"];
    $lastname = $_POST["lastname_input"];
    $email = $_POST["email_input"];
    $password = $_POST["password_input"];
    $passwordConfirm = $_POST["passwordConfirm_input"];

    $reg = '/^([^0-9\/\.\!\?\,\§\£\*\&\~\#\{\$\@])+$/i';


    if (preg_match($reg, $firstname) && preg_match($reg, $lastname)){
        echo "text valide";
        
    }else{
        echo "text invalide";
    }

?>