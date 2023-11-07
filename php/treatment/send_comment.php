<?php

session_start(); 

include_once("../database/connector.php");
include_once("../model/manager.php");
include_once("../model/recipe/recipe.php");
include_once("../model/recipe/recipemanager.php");
include_once("../model/user/user.php");
include_once("../model/user/usermanager.php");
include_once("../model/comment/comment.php");
include_once("../model/comment/commentmanager.php");

$rm = new RecipeManager();
$um = new UserManager();
$recipe = $rm->getRecipeById($_POST['recipeId']);
$rm->sendComment($um->getUserById($_SESSION['userId']), $recipe, $_POST['comment']);


?>