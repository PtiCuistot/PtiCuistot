<?php
    echo "AAA";

    include_once("../model/recipe/recipe.php");
    include_once("../model/recipe/recipeManager.php");

    echo "<br>AAA<br>";

    $recipe = new Recipe("Title", "Content", "Image", "Created", "Updated");
    echo $recipe->getId();
    echo "<br>";
    echo $recipe->getTitle();
    echo "<br>";
    echo $recipe->getContent();
    echo "<br>";

    $rcp = new RecipeManager();
    $rcp->insertRecipe($recipe);
    $rc = $rcp->getRecipeById(1);
    echo $rc;
?>