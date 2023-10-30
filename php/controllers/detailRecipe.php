<?php 

function detailRecipe()
{
    include_once("php/database/connector.php");
    include_once("php/model/manager.php");
    include_once("php/model/recipe/recipe.php");
    include_once("php/model/recipe/recipemanager.php");
    include_once("php/model/user/usermanager.php");
    include_once("php/model/user/user.php");

    $rm = new RecipeManager();
    $um = new UserManager();
    
    if(!isset($_SESSION))
    {
        session_start();
        $_SESSION['userId'] = 1; //TODO : Changer
        $_SERVER['admin'] = true; //TODO : Changer
    }


    if (isset($_GET['id'])) {
        $recipe = $rm->getRecipeById(intval($_GET['id']));
        if ($recipe != null) {
            if ($recipe->getValidate() == false) {
                if (isset($_SESSION['userId'])) {
                    if (intval($_SESSION['userId']) != intval($recipe->getUserId()) && !$_SESSION['admin']) {
                        $recipe = null;
                    }
                }
            }
        }
    }


    return require("php/template/detailRecette.php");
}

?>