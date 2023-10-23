<?php

include_once("manager.php");
include_once("recipe/recipe.php");
include_once("recipeManager/recipemanager.php");

$cat = new Category("Juice", "A juicy red fruit", 1);
$catMan = new CategoryManager();
$catMan->insertCategory($cat);  

?>