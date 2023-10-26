<?php 

include_once("../model/manager.php");
include_once("../model/recipe/recipe.php");
include_once("../model/recipe/recipemanager.php");
include_once("../model/ingredientWeight/ingredientweight.php");
include_once("../model/ingredientWeight/ingredientweightmanager.php");

$recipe = new Recipe(1, $_POST["recipeTitle"], $_POST["recipeContent"], $_POST["recipeImage"], date('Y-m-d'), date('Y-m-d'), $_POST['recipeCategory']);
$recipeManager = new RecipeManager(); 
$recipeId = $recipeManager->insertRecipe($recipe);
$recipe = $recipeManager->getRecipeById($recipeId);

$ingredientData = array();
echo $recipe->getId();


foreach ($_POST as $key => $value) {
    if (strpos($key, 'ingredient_') === 0) {
        $id = substr($key, strlen('ingredient_'));

        if (!isset($ingredientData[$id])) {
            $ingredientData[$id] = array(
                'quantity' => null,
                'unity' => null,
            );
        }

        if (strpos($key, '_unity') === false) {
            $ingredientData[$id]['quantity'] = $value;
        } else {
            $ingredientData[$id]['unity'] = $value;
        }
    }
}

foreach ($ingredientData as $id => $data) {
    $id = $id;
    $weight = $data['quantity'];
    $weightUnity = $data['unity'];



    $ingredient = new IngredientWeight($recipeId, $id, $weight, "g"); 
    $ingredientManager = new IngredientWeightManager(); 
    $ingredientManager->insertIngredientWeight($ingredient);
}