<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>S'inscrire</title>
        <?php include('link.php'); ?>
    </head>
        <?php include('header.php');?>

        <section style="background-color: #eee;">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="card rounded-3" style="text-align: center;">
                        <div class="card-body p-4">
                            <form action="php/treatment/treatment_registration.php" id="recipeForm" method="POST" class="needs-validation" novalidate>

                                <div class="svg-wrapper wrapperFormCreateRecipeTitle" style="width: auto;">
                                    <svg height="60" width="500" xmlns="http://www.w3.org/2000/svg" style="z-index: 5;">
                                        <rect class="shape" height="60" width="500" />
                                        <div class="text">Inscription</div>
                                    </svg>
                                </div>
        
                                <div class="bg-white rounded shadow-sm p-4" style="border: 1px solid black;">
                                    <div class="form-outline">
                                        <input name="pseudo_input" type="text" id="pseudo_input" class="form-control" required></input>
                                        <label class="form-label" for="pseudo_input">Pseudo</label>
                                    </div>

                                    <div class="form-outline">
                                        <input name="firstname_input" type="text" id="firstname_input" class="form-control"></input>
                                        <label class="form-label" for="firstname_input">Prénom (optionnel)</label>
                                    </div>

                                    <div class="form-outline">
                                        <input name="lastname_input" type="text" id="lastname_input" class="form-control"></input>
                                        <label class="form-label" for="lastname_input">Nom de famille (optionnel)</label>
                                    </div>

                                    <div class="form-outline">
                                        <input name="email_input" type="email" id="email_input" class="form-control" required></input>
                                        <label class="form-label" for="email_input">Email</label>
                                    </div>

                                    <div class="form-outline">
                                        <input name="password_input" type="password" id="password_input" class="form-control" required></input>
                                        <label class="form-label" for="password_input">Mot de passe</label>
                                    </div>
            
                                    <div class="form-outline">
                                        <input name="passwordConfirm_input" type="password" id="passwordConfirm_input" class="form-control" required /></input>
                                        <label class="form-label" for="passwordConfirm_input">Confirmer le mot de passe</label>
                                    </div>
                                </div>

                                <p>Déjà un compte ? <a href="login.php">Se connecter</a></p>
        
                                <input type="submit" value="S'inscrire" id="submitButton" class="btn btn-success btn-lg btn-block px-5 py-3 submitButtonCreationRecipe"></input>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php include('footer.php');?>