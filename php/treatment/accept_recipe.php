<?php 

include_once("../model/manager.php");
include_once("../model/recipe/recipe.php");
include_once("../model/recipe/recipemanager.php");

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $rm = new RecipeManager();
    $recipe = $rm->getRecipeById(intval($_POST['recipeId'])); 
    $recipe = $recipe->setValidate(1); 
    $recipe = $recipe->setTitle("Gateau à la cerise");
    $rm->updateRecipe($recipe);
    header('location: index.php');
}
else
{
    header('location: index.php');
}

?>