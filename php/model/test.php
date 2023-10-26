<?php
    include_once("../model/recipe/recipe.php");
    include_once("../model/recipe/recipemanager.php");

    include_once("../model/tag/tag.php");
    include_once("../model/tag/tagmanager.php");

    $tag = new Tag("Désert", 1);
    $tagManager = new TagManager(); 

    $tagManager->insertTag($tag);
    $tag = $tagManager->getTagByName("Désert"); 

    $recipeManager = new RecipeManager(); 
    $recipe = $recipeManager->getRecipeById(1); 

    $recipeManager->addTag($recipe, $tag);
    
    print_r($recipeManager->getTag($recipe));
?>