<?php
    include_once("../model/recipe/recipe.php");
    include_once("../model/recipe/recipeManager.php");
/*
    $date = date("Y-m-d");
    $recipe = new Recipe("a", "dd", "ff", $date, $date, 1);

    $rcp = new RecipeManager();
    $rcp->insertRecipe($recipe);

    $rc = $rcp->getRecipeById(20);
    echo $rc->getTitle();

    */

    include_once("../model/user/user.php");
    include_once("../model/user/usermanager.php");

    include_once("manager.php");

    $mana = new Manager();
    var_dump($mana);
/*
    $user = new User("Waterfox", "clement.baratin@etu.unicaen.fr", "ahudauyg", "a", "b");
    $usermanager = new UserManager();
    $usermanager->insertUser($user);*/
?>