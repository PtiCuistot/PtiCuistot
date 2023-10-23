<?php
    echo "AAA";

include_once("manager.php");
include_once("ingredient/ingredientmanager.php");
include_once("ingredient/ingredient.php");

$apple = new Ingredient("Apple", "A juicy red fruit");
$ingManager = new IngredientManager();  

$apple = $ingManager->getIngredientByName("Apple");

echo $apple->getDescription();
?>