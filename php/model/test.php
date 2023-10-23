<?php

include_once("manager.php");
include_once("recipe/recipe.php");
include_once("recipe/recipemanager.php");

$currentDate = date("Y-m-d");

$rec = new Recipe("Mon titre", "bla bla", "lala", $currentDate, $currentDate, 1);
$recMan = new RecipeManager();
$recMan->insertRecipe($rec);  

?>