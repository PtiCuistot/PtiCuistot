<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>S'inscrire</title>
        <link rel="stylesheet" href="../../assets/styles/style.css">
        <link rel="stylesheet" href="../../assets/styles/NavBar.css">
    </head>
        <?php include('header.php');?>
        
        <form action="../treatment/treatment_registration.php" method="post">
            <label for="pseudo_input">Pseudonyme *</label>
            <input type="text" name="pseudo_input" id="pseudo_input" required></input>
            <label for="firstname_input">Prénom</label>
            <input type="text" name="firstname_input" id="firstname_input"></input>
            <label for="lastname_input">Nom de famille</label>
            <input type="text" name="lastname_input" id="lastname_input"></input>
            <label for="email_input">Email *</label>
            <input type="email" name="email_input" id="email_input" required></input>
            <label for="password_input">Mot de passe *</label>
            <input type="password" name="password_input" id="password_input" required></input>
            <label for="passwordConfirm_input">Confirmer le mot de passe *</label>
            <input type="password" name="passwordConfirm_input" id="passwordConfirm_input" required></input>
            <button type="submit">S'inscrire</button>
        </form>

        <?php include('footer.php');?>