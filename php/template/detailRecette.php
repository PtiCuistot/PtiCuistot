<?php session_start(); ?>
<?php
if (isset($_GET['id'])) {

    $_SESSION['userId'] = 1; //TODO : Changer quand page de connexion faîtes !

    include_once("../model/manager.php");
    include_once("../model/recipe/recipe.php");
    include_once("../model/recipe/recipemanager.php");
    include_once("../model/user/usermanager.php");


    $rm = new RecipeManager();
    $um = new UserManager();

    $recipe = $rm->getRecipeById(intval($_GET['id']));
    if ($recipe->getValidate() == false) {
        if (isset($_SESSION['userId'])) {
            if (intval($_SESSION['userId']) != intval($recipe->getUserId()) && !$_SESSION['admin']) {
                $recipe = null;
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <?php
    if ($recipe != null) {
        echo '<title>' . $recipe->getTitle() . '</title>';
    } else {
        echo '<title>Recette non trouvée</title>';
    }
    ?>

    <?php include('link.php'); ?>
</head>
<?php include('header.php'); ?>
<div class="Recipe">
    <?php if ($recipe != null) : ?>
        <img src="<?php echo $recipe->getImage(); ?>" height="650px" class="img-fluid rounded" alt="Image de la recette">
        <h1 class="display-3 RecipeTitle"><?php echo $recipe->getTitle(); ?></h1>
        <h3><i>Une recette de <?php echo $um->getUserById($recipe->getUserId())->getUsername(); ?></i></h3>
        <p>Dernière Mise à jour : <?php echo $recipe->getUpdated()->format('d/m/Y') ?> </p>
        <div class="container">
    
            <h4>Liste des ingrédients</h4>
            <table class="table mb-4" id="ingredientArrayGlobal">
                <thead>
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Quantité</th>
                        <th scope="col">Unités</th>
                    </tr>
                </thead>
                <tbody id="ingredientArray">
                    <?php
                    foreach($rm->getRecipeIngredients($recipe) as $row)
                    {
                        echo '
                        <tr>
                            <td>'.$row['ing_name'].'</td>
                            <td>'.$row['iw_weight'].'</td>
                            <td>'.$row['iw_unity'].'</td>
                        </tr>';
                    }
                    ?>
                </tbody>
            </table>

            <h4>Recette</h4>
            <p class="RecipeContent"><?php echo $recipe->getContent(); ?></p>
    
        </div>


        <?php if (intval($_SESSION['userId']) != intval($recipe->getUserId())) : ?>
            <h4>Action créateur</h4>
            <form>
                <input name = 'recipeId' value="<?php echo $recipe->getId() ?>" hidden>
                <input class="btn btn-success" type="submit" value="Mettre à jour ma recette">
            </form>
        <?php endif; ?>

        <?php if ($_SESSION['admin']) : ?>
            <h4>Action Administrateur</h4>
            <form method="POST" action="../treatment/accept_recipe.php">
                <input name = 'recipeId' value="<?php echo $recipe->getId() ?>" hidden>
                <input class="btn btn-success" type="submit" value="Valider la recette">
            </form>
        <?php endif; ?>
    <?php else : ?>
        <h1>Recette non trouvée</h1>
    <?php endif; ?>
</div>

<?php include('footer.php'); ?>