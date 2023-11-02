<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>S'inscrire</title>
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

        <section style="background-color: #eee;">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="card rounded-3" style="text-align: center;">
                        <div class="card-body p-4">
                            <form action="../treatment/treatment_registration.php" method="POST" class="needs-validation" novalidate>

                                <h2 class="h2Recipe">Inscription</h2>
        
                                <div class="form-outline">
                                    <input name="pseudo_input" type="text" id="pseudo_input" class="form-control" required>
                                    <label class="form-label" for="pseudo_input">Pseudo</label>
                                </div>

                                <div class="form-outline">
                                    <input name="firstname_input" type="text" id="firstname_input" class="form-control">
                                    <label class="form-label" for="firstname_input">Prénom (optionnel)</label>
                                </div>

                                <div class="form-outline">
                                    <input name="lastname_input" type="text" id="lastname_input" class="form-control">
                                    <label class="form-label" for="lastname_input">Nom de famille (optionnel)</label>
                                </div>

                                <div class="form-outline">
                                    <input name="email_input" type="email" id="email_input" class="form-control" required>
                                    <label class="form-label" for="email_input">Email</label>
                                </div>

                                <div class="form-outline">
                                    <input name="password_input" type="password" id="password_input" class="form-control" required>
                                    <label class="form-label" for="password_input">Mot de passe</label>
                                </div>
        
                                <div class="form-outline">
                                    <input name="passwordConfirm_input" type="password" id="passwordConfirm_input" class="form-control" required />
                                    <label class="form-label" for="passwordConfirm_input">Confirmer le mot de passe</label>
                                </div>
        
                                <input type="submit" value="Se connecter" id="submitButton" class="btn btn-success btn-lg btn-block px-5 py-3 submitButtonCreationRecipe">Se connecter</input>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- <div class="sign">

            <div class="content">
        
                <h1>Inscription</h1>

                <form action="../treatment/treatment_registration.php" method="post">

                    <label for="pseudo_input">Pseudonyme</label>
                    <input type="text" name="pseudo_input" id="pseudo_input" required></input>

                    <label for="firstname_input">Prénom (optionnel)</label>
                    <input type="text" name="firstname_input" id="firstname_input"></input>

                    <label for="lastname_input">Nom de famille (optionnel)</label>
                    <input type="text" name="lastname_input" id="lastname_input"></input>

                    <label for="email_input">Email</label>
                    <input type="email" name="email_input" id="email_input" required></input>

                    <label for="password_input">Mot de passe</label>
                    <input type="password" name="password_input" id="password_input" required></input>

                    <label for="passwordConfirm_input">Confirmer le mot de passe</label>
                    <input type="password" name="passwordConfirm_input" id="passwordConfirm_input" required></input>

                    <p>Déjà un compte ? <a href="login.php">Se connecter ici</a></p>

                    <button type="submit">S'inscrire</button>
                </form>

            </div>

        </div> -->

        <?php include('footer.php');?>