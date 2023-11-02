<?php 
    include_once("../database/connector.php");

    include_once("../model/manager.php");
    include_once("../model/user/usermanager.php");
    include_once("../model/user/user.php");

    function filter_string(string $string): string
    {
        $nonWanted = ["'", '"', ' ', '&', '~', '#', '{', '(', '[', '|', '`', "\\", '_', '^', '@', ')', ']', '=', '+', '}', '^', '¨', '$', '£', '¤', '%', '*', 'µ', ',', '?', ';', '.', ':', "/", '!', '§', '-', '0', '1', '2', '3','4', '5', '6','7', '8', '9'];
        $str = preg_replace('/\x00|<[^>]*>?/', '', $string);
        $str = str_replace($nonWanted,'', $str);
        if ($str != $string) {
            header('Location: ../template/registration.php');
        }
        return $str;
    }

    function filter_space_remove(string $string): string
    {
        $nonWanted = [' ', '{', '(', '[', "\\", ')', ']', '}'];
        $str = preg_replace('/\x00|<[^>]*>?/', '', $string);
        $str = str_replace($nonWanted,'', $str);
        if ($str != $string) {
            header('Location: ../template/registration.php');
        }
        return $str;
    }

    if(isset($_POST["pseudo_input"])){
        $pseudo = filter_space_remove($_POST["pseudo_input"]);
    }

    if(isset($_POST["firstname_input"])){
        $fname = filter_string($_POST["firstname_input"]);
    }

    if(isset($_POST["lastname_input"])){
        $lname = filter_string($_POST["lastname_input"]);
    }

    if(isset($_POST["email_input"])){
        $mail = filter_input(INPUT_POST, "email_input", FILTER_SANITIZE_EMAIL);
    }

    if(isset($_POST["password_input"])){
        $pwd = filter_space_remove($_POST["password_input"]);
    }

    if(isset($_POST["passwordConfirm_input"])){
        $vpwd = filter_space_remove($_POST["passwordConfirm_input"]);
    }

    if ($pwd === $vpwd) {
        $newUser = new User($pseudo , $mail, password_hash($pwd, PASSWORD_DEFAULT), $fname, $lname);
        $um = new UserManager();

        if($um->getUserByMail($mail) == NULL ){
            try{
                $newUser = $um->getUserById(intval($um->insertUser($newUser)));
                session_start();
                $_SESSION['userId'] = $newUser->getId();
                header('Location: index.php');
            }catch(Exception $e){
                echo $e;
            }
        }else{
            echo "email already used";
        }
    }
    else {
        echo "password are not the same";
    }
    

?>