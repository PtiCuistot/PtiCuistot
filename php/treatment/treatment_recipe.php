<?php 

include_once("../database/connector.php");
include_once("../model/manager.php");
include_once("../model/recipe/recipe.php");
include_once("../model/recipe/recipemanager.php");
include_once("../model/ingredient/ingredient.php");
include_once("../model/ingredient/ingredientmanager.php");
include_once("../model/ingredientWeight/ingredientweight.php");
include_once("../model/ingredientWeight/ingredientweightmanager.php");
include_once("../model/tag/tag.php");
include_once("../model/tag/tagmanager.php");

$recipe = new Recipe(1, $_POST["recipeTitle"], $_POST["recipeContent"], $_POST["recipeImage"], 3, date('Y-m-d'), date('Y-m-d'), 0, $_POST['recipeCategory']); //TODO UPDATE WHEN NOTE IMPLEMENTSw
$recipeManager = new RecipeManager(); 
$recipeId = $recipeManager->insertRecipe($recipe);
$recipe = $recipeManager->getRecipeById($recipeId);

$ingredientData = json_decode($_POST['ingredientData'], true);
$tagData = json_decode($_POST['tagData'], true);

$iwManager = new IngredientWeightManager();
$ingManager = new IngredientManager();
$tagManager = new TagManager();

foreach($ingredientData as $id => $data)
{

    if (intval($id) != 0)
    {
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

foreach($tagData as $id => $data)
{

    if(intval($data[0]) != 0)
    {
        $t = $tagManager->getTagById(intval($data[0])); 
        $recipeManager->addTag($recipe, $t); 
    }
    else
    {

        $t = new Tag($data[0], 1); 
        $t = $tagManager->getTagById($tagManager->insertTag($t));
        $recipeManager->addTag($recipe, $t);                
    }
}

header('Location: ../../recipe.php');
?>