<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Mon compte</title>
    <?php include('link.php'); ?>
</head>
<?php include('header.php'); ?>
<section style="background-color: #eee;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <h3><?php echo $user->getUsername(); ?></h3>
            <h4>Mettre à jour mon mot de passe</h4>
            <br>
            <form method="POST" action="php/treatment/updatePwd.php">
                <div class="form-outline">
                    <input name="actualPwd" type="password" id="recipeImage" class="form-control RecipeImage" required />
                    <label class="form-label" for="typeURL">Mot de passe actuel</label>
                </div>
                <br>
                <div class="form-outline">
                    <input type="password" name="newPwd" id="recipeImage" class="form-control RecipeImage" required />
                    <label class="form-label" for="typeURL">Nouveau mot de passe</label>
                </div>
                <br>
                <input type="submit" class="btn btn-success" value="Mettre  à jour mon mot de passe" />
                <br> 
            </form>
            <h4>Supprimer mon compte</h4>
            <form action="php/treatment/disable.php" method="POST">
                <input type="submit" class="btn btn-danger" value="Supprimer mon compte"/>
            </form>
            <br>
            <form action="php/treatment/disconnect.php" method="POST">
                <input type="submit" class="btn btn-warning" value="Me déconnecter"/>
            </form>
        </div>
    </div>
</section>


<?php include('footer.php'); ?>