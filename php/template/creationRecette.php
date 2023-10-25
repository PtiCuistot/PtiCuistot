<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Nos Recettes</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
        
        <link rel="stylesheet" href="../../assets/styles/style.css">
        <link rel="stylesheet" href="../../assets/styles/NavBar.css">
    </head>
        <?php include('header.php');?>
        <form action="../treatment/treatment_recipe.php" id="recipeForm" method="POST">
            
            <h2>Informations de la recette</h2>
            
            <input type="text" name="recipeTitle" id="recipeTitle" class="RecipeTitle" placeholder="Nom de la recette">
            <br>
            <textarea name="recipeContent" id="recipeContent" class="RecipeContent" placeholder="Description de la recette"></textarea>
            <br>
            <input type="url" name="recipeImage" id="recipeImage" class="RecipeImage" placeholder="URL de l'image">
        
            <h2>Tags et catégories</h2>
            
            <label for="categorySelect">Catégorie :</label>
            <select name="recipeCategory" id="recipeCategory" class="RecipeCategory">
                <?php
                    include_once("../model/manager.php");
                    include_once("../model/category/category.php");
                    include_once("../model/category/categorymanager.php");
                    
                    $cm = new CategoryManager();

                    foreach($cm->getCategories() as $category)
                    {
                        echo "<option value=".$category[0]->getId().">".$category[0]->getTitle()."</option>";
                    }
                    
                ?>
            </select>
            
            <h2>Ingrédients de la recette</h2>

            <label for="ingredientsInput">Ajouter un ingrédient</label>
            <select name="recipeIngredients" id="recipeIngredients" class="RecipeIngredients">
                <?php
                    include_once("../model/manager.php");
                    include_once("../model/ingredient/ingredient.php");
                    include_once("../model/ingredient/ingredientmanager.php");
                    
                    $cm = new IngredientManager();

                    foreach($cm->getIngredients() as $ingredient)
                    {
                        echo "<option value=".$ingredient->getId().">".$ingredient->getName()."</option>";
                    }
                ?>
                <option>Ajouter un ingrédient</option>
            </select>
            <input type="number" name="ingredientWeight" id="ingredientWeight" class="IngredientWeight" placeholder="Quantité">
            <input type="text" name="ingredientWeightUnity" id="ingredientWeightUnity" class="IngredientWeightUnity" placeholder="Unité">
            <button type="button" id="addIngredient">Ajouter un ingrédient</button>
            
            <div>
                <h4>Liste des ingrédients</h4>
                <div id="ingredientList">

                </div>
            </div>
            
            <input type="submit" value="Créer ma recette" id="submitButton"></input>

        </form>
        <script src="../../assets/scripts/RecipeCreation.js"></script>

        <?php include_once('footer.php');?>