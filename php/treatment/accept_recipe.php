<?php 
include_once("../database/connector.php");
include_once("../model/manager.php");
include_once("../model/recipe/recipe.php");
include_once("../model/recipe/recipemanager.php");

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $rm = new RecipeManager();
    $recipe = $rm->getRecipeById(intval($_POST['recipeId'])); 
    $recipe = $recipe->setValidate(1); 
    $rm->updateRecipe($recipe);
    
}
header('location: ../../index.php');

?>