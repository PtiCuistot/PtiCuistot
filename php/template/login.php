<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Connexion</title>
        <?php include('link.php')?>
    </head>

        <?php include('header.php');?>

        <section style="background-color: #eee;">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="card rounded-3" style="text-align: center;">
                        <div class="card-body p-4">
                            <form action="php/treatment/treatment_login.php" id="recipeForm" method="POST" class="needs-validation" novalidate>

                                <h2 class="h2Recipe">Connexion</h2>
        
                                <div class="form-outline">
                                    <input name="email_input" type="email" id="email_input" class="form-control" required>
                                    <label class="form-label" for="email_input">Email</label>
                                </div>
        
                                <div class="form-outline">
                                    <input type="password" name="password_input" id="password_input" class="form-control" required />
                                    <label class="form-label" for="password_input">Mot de passe</label>
                                </div>
        
                                <input type="submit" value="Se connecter" id="submitButton" class="btn btn-success btn-lg btn-block px-5 py-3 submitButtonCreationRecipe">S'inscrire</input>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--<div class="sign">

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

        </div> -->
        
        <?php include('footer.php');?>
 