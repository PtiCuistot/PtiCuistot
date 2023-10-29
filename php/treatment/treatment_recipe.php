<?php 

include_once("../model/manager.php");
include_once("../model/recipe/recipe.php");
include_once("../model/recipe/recipemanager.php");
include_once("../model/ingredient/ingredient.php");
include_once("../model/ingredient/ingredientmanager.php");
include_once("../model/ingredientWeight/ingredientweight.php");
include_once("../model/ingredientWeight/ingredientweightmanager.php");

$recipe = new Recipe(1, $_POST["recipeTitle"], $_POST["recipeContent"], $_POST["recipeImage"], date('Y-m-d'), date('Y-m-d'), $_POST['recipeCategory']);
$recipeManager = new RecipeManager(); 
$recipeId = $recipeManager->insertRecipe($recipe);
$recipe = $recipeManager->getRecipeById($recipeId);

$ingredientData = json_decode($_POST['ingredientData'], true);

$iwManager = new IngredientWeightManager();
$ingManager = new IngredientManager();

foreach($ingredientData as $id => $data)
{

    if (intval($id) != 0)
    {
        echo 'passed';
        $iw = new IngredientWeight($recipeId, intval($id), intval($data['quantity']), $data['unity']); 
        $iwManager->insertIngredientWeight($iw);
    }
    else
    {
        $ing = new Ingredient($id);
        $ingId = $ingManager->insertIngredient($ing);   
        $iw = new IngredientWeight($recipeId, $ingId, intval($data['quantity']), $data['unity']); 
        $iwManager->insertIngredientWeight($iw);     
    }
}

header('Location: recipe.php');
?>