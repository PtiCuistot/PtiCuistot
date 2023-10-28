<?php

if(isset($_GET['id']))
{
    include_once("../model/manager.php");
    include_once("../model/recipe/recipe.php");
    include_once("../model/recipe/recipemanager.php");
    include_once("../model/user/usermanager.php");


    $rm = new RecipeManager(); 
    $um = new UserManager();

    $recipe = $rm->getRecipeById(intval($_GET['id']));    
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <?php 
            if($recipe != null)
            {
                echo '<title>'.$recipe->getTitle().'</title>';
            }
            else
            {
                echo '<title>Recette non trouvée</title>';
            }
        ?>

        <?php include('link.php'); ?>
    </head>
        <?php include('header.php');?>
            <?php if($recipe != null) : ?>
                <h1><?php echo $recipe->getTitle();?></h1>
                <p><?php echo $recipe->getContent();?></p>
            <?php else: ?>
                <h1>Recette non trouvée</h1>
            <?php endif; ?>

        <?php include('footer.php');?>