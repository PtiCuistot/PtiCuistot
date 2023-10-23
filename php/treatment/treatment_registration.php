<?php 
    include_once("../model/manager.php");
    include_once("../model/user/usermanager.php");
    include_once("../model/user/user.php");



    $pseudo = $_POST["pseudo_input"];
    $firstname = $_POST["firstname_input"];
    $lastname = $_POST["lastname_input"];
    $email = $_POST["email_input"];
    $password = $_POST["password_input"];
    $passwordConfirm = $_POST["passwordConfirm_input"];

    $reg = '/^([^0-9\/\.\!\?\,\§\£\*\&\~\#\{\$\@])+$/i';


    if (preg_match($reg, $firstname) && preg_match($reg, $lastname)){
        $newUser = new User($pseudo , $email, password_hash($password, PASSWORD_DEFAULT), $firstname, $lastname);
        $um = new UserManager();

        if($um->getUserByMail($email) == NULL ){
            try{
                $um->insertUser($newUser);
                header('Location: ../template/registration.php');
            }catch(Exception $e){
                echo $e;
            }
        }else{
            echo "email already used";
        }
    }else{
        echo "incorrect input";
    }
?>