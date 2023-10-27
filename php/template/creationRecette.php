<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Nos Recettes</title>
        <?php include('link.php'); ?>
    </head>
        <?php include('header.php');?>
        <div class="centerFormCreationRecette">
            <form action="../treatment/treatment_recipe.php" id="recipeForm" method="POST" class="needs-validation" novalidate>
                <h1 class="CreateRecipeTitle">Création de recettes</h1>
                <h2 class="h2Recipe">Informations de la recette</h2>
                
                <div class="form-group">
                    <label class="control-label" for="recipeTitle">Nom de la recette</label>
                    <input type="text" name="recipeTitle" class="form-control RecipeTitle" placeholder="Nom de la recette" id="recipeTitle" aria-describedby="inputWarning2Status" placeholder="Unité" required>
                </div>
                
                <div class="form-outline mb-4">
                    <label class="form-label" for="form6Example7">Description de la recette</label>
                    <textarea name="recipeContent" id="recipeContent" class="form-control RecipeContent" id="form6Example7" rows="4" placeholder="Description de la recette" required></textarea>
                </div>
                
                <div class="form-outline">
                    <label class="form-label" for="typeURL">URL de l'image de la recette</label>
                    <input type="url" name="recipeImage" id="recipeImage" class="form-control RecipeImage" placeholder="URL de l'image" required/>
                </div>

                <h2 class="h2Recipe">Tags et catégories</h2>
                <label class="control-label" for="selectCategorie">Catégorie de la recette</label>
                <div class="form-group">
                    <select class="custom-select" aria-placeholder="Selectionner une catégorie" name="selectCategorie" required>
                        <option value="">Sélectionner une catégorie</option>
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
                </div>
                
                <h2 class="h2Recipe">Ingrédients de la recette</h2>
                <label for="ingredientsInput">List des ingrédients</label>
                <div class="form-row">
                    <div class="col">
                        <div class="form-group">
                            <select name="recipeIngredients" id="recipeIngredients" aria-placeholder="Selectionner un ingrédient" class="custom-select RecipeIngredients" required>
                                <option value="">Sélectionner un ingrédient</option>
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
                                <option>Créer un ingrédient</option>
                            </select>
                        </div>
                    </div>

                    <div class="col" id="ingredientNameCol">
                        <div class="form-group">
                            <input type="text" id="ingredientName" placeholder="Nom de l'ingrédient" class="form-control" required>
                        </div>
                    </div>
                    
                    <div class="col">
                        <div class="form-outline">
                            <input type="number" name="ingredientWeight" id="ingredientWeight"  class="form-control IngredientWeight" placeholder="Quantité" required min="0" step="0.01"/>
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                            <input type="text" name="ingredientWeightUnity" class="form-control ingredientWeightUnity" id="ingredientWeightUnity" placeholder="Unité" required>
                        </div>
                    </div>

                    <div class="col">
                        <a href="#" class="btn btn-dark text-uppercase" id="addIngredientButton">Ajouter un ingrédient</a>
                    </div>
                </div>
                
                <div id="ingredientListDiv">
                    <h4>Liste des ingrédients</h4>
                    <div id="ingredientList">
                    </div>
                </div>
                <input type="submit" value="Créer ma recette" id="submitButton" class="btn btn-success btn-lg btn-block px-5 py-3"></input>
            </form>
        </div>
        <script src="../../assets/scripts/RecipeCreation.js"></script>
        <?php include_once('footer.php');?>
