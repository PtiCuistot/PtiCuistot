<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Mon compte</title>
    <?php include('link.php'); ?>
</head>
<?php include('header.php'); ?>
<section style="background-color: #eee;overflow: hidden;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="card rounded-3" style="text-align: center;">
                <div class="card-body p-4">
                    <h3 class="text-rainbow" style="font-size: 40px;"><?php echo $user->getUsername(); ?></h3>
                    <div class="svg-wrapper wrapperFormCreateRecipeTitle" style="width: auto;">
                        <svg height="60" width="500" xmlns="http://www.w3.org/2000/svg" style="z-index: 5;">
                            <rect class="shape" height="60" width="500" />
                            <div class="text">Changer mon mot de passe</div>
                        </svg>
                    </div>
                    <div class="bg-white rounded shadow-sm p-4" style="border: 1px solid black;">
                        <form method="POST" action="php/treatment/updatePwd.php" class="displayFlex formUser">
                            <div class="form-outline">
                                <input name="actualPwd" type="password" id="recipeImage" class="form-control RecipeImage" required />
                                <label class="form-label" for="typeURL">Mot de passe actuel</label>
                            </div>
                            <div class="form-outline">
                                <input type="password" name="newPwd" id="recipeImage" class="form-control RecipeImage" required />
                                <label class="form-label" for="typeURL">Nouveau mot de passe</label>
                            </div>
                            <input type="submit" class="btn btn-success" value="Mettre  à jour mon mot de passe" style="width: 80%;"/>
                        </form>
                    </div>
                    <div class="svg-wrapper wrapperFormCreateRecipeTitle" style="width: auto;">
                        <svg height="60" width="500" xmlns="http://www.w3.org/2000/svg" style="z-index: 5;">
                            <rect class="shape" height="60" width="500" />
                            <div class="text">Supprimer mon compte</div>
                        </svg>
                    </div>
                    <div class="bg-white rounded shadow-sm p-4 UserButtonDiv">
                        <form action="php/treatment/disable.php" method="POST" class="displayFlex" style="width: 50%;">
                            <input type="number" name="userId" value="<?php echo $_SESSION['userId'] ?>" hidden>
                            <input type="submit" class="btn btn-danger" value="Supprimer mon compte" style="width: 80%;"/>
                        </form>
                        <form action="php/treatment/disconnect.php" method="POST" class="displayFlex" style="width: 50%;">
                            <input type="submit" class="btn btn-warning" value="Me déconnecter" style="width: 80%;"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php include('footer.php'); ?>