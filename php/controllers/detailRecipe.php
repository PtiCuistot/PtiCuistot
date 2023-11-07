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

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
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