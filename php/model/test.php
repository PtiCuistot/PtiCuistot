<?php
    include_once("../model/recipe/recipe.php");
    include_once("../model/recipe/recipemanager.php");

    $rcp = new RecipeManager();
    $recipes = $rcp->getRecipes();

    print_r($recipes)
?>