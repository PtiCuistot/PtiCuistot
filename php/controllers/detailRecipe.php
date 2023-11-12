<?php 

function detailRecipe()
{

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    include_once("php/database/connector.php");
    include_once("php/model/manager.php");
    include_once("php/model/recipe/recipe.php");
    include_once("php/model/recipe/recipemanager.php");
    include_once("php/model/tag/tagmanager.php");
    include_once("php/model/tag/tag.php");
    include_once("php/model/user/usermanager.php");
    include_once("php/model/user/user.php");
    include_once("php/model/comment/comment.php");
    include_once("php/model/comment/commentmanager.php");

    $rm = new RecipeManager();
    $um = new UserManager();

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

    $commentList = $rm->getComments($rm->getRecipeById(intval($_GET['id'])));

    return require("php/template/detailRecette.php");
}

?>