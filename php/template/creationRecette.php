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
            <form action="../treatment/treatment_recipe.php" id="recipeForm" method="POST">
                <h1>Création de recettes</h1>
                <h2>Informations de la recette</h2>
                <div class="form-group has-warning has-feedback">
                    <label class="control-label" for="recipeTitle">Nom de la recette :</label>
                    <input type="text" name="recipeTitle" class="form-control RecipeTitle" placeholder="Nom de la recette" id="recipeTitle" aria-describedby="inputWarning2Status" placeholder="Unité">
                    <span class="glyphicon glyphicon-warning-sign form-control-feedback" aria-hidden="true"></span>
                    <span id="recipeTitle" class="sr-only">(warning)</span>
                </div>
                <div class="form-outline mb-4">
                    <label class="form-label" for="form6Example7">Additional information</label>
                    <textarea name="recipeContent" id="recipeContent" class="form-control RecipeContent" id="form6Example7" rows="4" placeholder="Description de la recette"></textarea>
                </div>
                <div class="form-outline">
                    <label class="form-label" for="typeURL">URL input</label>
                    <input type="url" name="recipeImage" id="recipeImage" class="form-control RecipeImage" placeholder="URL de l'image"/>
                </div>
                <h2>Tags et catégories</h2>
                <div class="form-group">
                    <select id="recipeCategory" class="custom-select" required>
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
                    <div class="invalid-feedback">Example invalid custom select feedback</div>
                </div>
                <h2>Ingrédients de la recette</h2>
                <label for="ingredientsInput">Ajouter un ingrédient</label>
                <div class="form-row">
                    <div class="col">
                        <div class="form-group">
                            <select name="recipeIngredients" id="recipeIngredients" class="custom-select RecipeIngredients" required>
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
                        <div class="invalid-feedback">Example invalid custom select feedback</div>
                    </div>
                    <div class="col">
                        <div class="form-outline">
                            <input type="number" name="ingredientWeight" id="ingredientWeight"  class="form-control IngredientWeight" placeholder="Quantité"/>
                        </div>
                    </div>
                </div>
                <div class="form-group has-warning has-feedback">
                    <input type="text" id="ingredientName" placeholder="Nom de l'ingrédient" hidden>
                    <label class="control-label" for="ingredientWeightUnity">Unité :</label>
                    <input type="text" name="ingredientWeightUnity" class="form-control ingredientWeightUnity" id="ingredientWeightUnity" aria-describedby="inputWarning2Status" placeholder="Unité">
                    <span class="glyphicon glyphicon-warning-sign form-control-feedback" aria-hidden="true"></span>
                    <span id="ingredientWeightUnityStatus" class="sr-only">(warning)</span>
                </div>
                <div class="py-5 text-right"><a href="#" class="btn btn-dark px-5 py-3 text-uppercase" id="addIngredientButton">Ajouter un ingrédient</a></div>
                <div>
                    <h4>Liste des ingrédients</h4>
                    <div id="ingredientList">
                    </div>
                </div>
                <input type="submit" value="Créer ma recette" id="submitButton" class="btn btn-outline-success btn-lg btn-block"></input>
            </form>
        </div>
        <script src="../../assets/scripts/RecipeCreation.js"></script>
        <?php include_once('footer.php');?>
