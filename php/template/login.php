<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Connexion</title>
        <?php include('link.php'); ?>
    </head>

        <?php include('header.php');?>

        <section style="background-color: #eee;">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="card rounded-3" style="text-align: center;">
                        <div class="card-body p-4">
                            <form action="../treatment/treatment_login.php" id="recipeForm" method="POST" class="needs-validation" novalidate>

                                <div class="svg-wrapper wrapperFormCreateRecipeTitle" style="width: auto;">
                                    <svg height="60" width="500" xmlns="http://www.w3.org/2000/svg" style="z-index: 5;">
                                        <rect class="shape" height="60" width="500" />
                                        <div class="text">Connexion</div>
                                    </svg>
                                </div>
                                
                                <div class="bg-white rounded shadow-sm p-4" style="border: 1px solid black;">
                                    <div class="form-outline">
                                        <input name="email_input" type="email" id="email_input" class="form-control" required>
                                        <label class="form-label" for="email_input">Email</label>
                                    </div>
            
                                    <div class="form-outline">
                                        <input type="password" name="password_input" id="password_input" class="form-control" required />
                                        <label class="form-label" for="password_input">Mot de passe</label>
                                    </div>
                                </div>

                                <p>Pas de compte ? <a href="registration.php">Créer un compte</a></p>
        
                                <input type="submit" value="Se connecter" id="submitButton" class="btn btn-success btn-lg btn-block px-5 py-3 submitButtonCreationRecipe"></input>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php include('footer.php');?>
 