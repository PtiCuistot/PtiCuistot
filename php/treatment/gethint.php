<?php 
    include_once ('../database/connector.php');
    include_once ('../model/manager.php');
    include_once ('../model/recipe/recipe.php');
    include_once("../model/recipe/recipemanager.php");

    $rm = new RecipeManager();
    $recipesList = $rm->getRecipes(1000);
    $q =  $_REQUEST["q"];

    $hint = "";
    
    // lookup all hints from array if $q is different from ""
    if ($q !== "") {
        $q = strtolower($q);
        $len=strlen($q);
        $hint.="<ul>";
        foreach($recipesList as $recipe) {
            $name = $recipe->getTitle();
            //echo "<script>console.log('Debug Objects: " . $name . "' );</script>";
            if (strpos(strtolower($name), $q) !== false) {
                $hint .= "<li onclick=selectInput(this)>".$name."</li>";
            }
        }
    $hint.="</ul>";
    }
    // Output "no suggestion" if no hint was found or output correct values
    echo $hint === "" ? "no suggestion" : $hint;
?>