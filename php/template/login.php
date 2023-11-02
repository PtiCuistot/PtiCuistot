<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Connexion</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="../../assets/styles/style.css">
        <link rel="stylesheet" href="../../assets/styles/NavBar.css">
    </head>

        <?php include('header.php');?>

        <div class="sign">

            <div class="content">

                <h1>Connexion</h1>

                <form action="../treatment/treatment_login.php" method="post">
                    <label for="email_input">Email</label>
                    <input type="email" name="email_input" id="email_input" required></input>
                    <label for="password_input">Mot de passe</label>
                    <input type="password" name="password_input" id="password_input" required></input>

                    <p>Pas de compte ? <a href="registration.php">Créer un compte ici</a></p>

                    <button type="submit">Se connecter</button>
                </form>

            </div>

        </div>
        
        <?php include('footer.php');?>
 