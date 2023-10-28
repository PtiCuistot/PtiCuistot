<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Nos Recettes</title>
    <?php include('link.php'); ?>
</head>
<?php include('header.php'); ?>
<section style="background-color: #eee;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="card rounded-3" style="text-align: center;">
                <div class="card-body p-4">
                    <form action="../treatment/treatment_recipe.php" id="recipeForm" method="POST" class="needs-validation" novalidate>
                        <h1 class="CreateRecipeTitle">Création de recettes</h1>
                        <h2 class="h2Recipe">Informations de la recette</h2>

                        <div class="form-outline">
                            <input type="text" id="recipeTitle" class="form-control" required>
                            <label class="form-label" for="form8Example4">Nom de la recette</label>
                        </div>

                        <div class="form-outline">
                            <textarea class="form-control RecipeContent" id="recipeContent" rows="4" required></textarea>
                            <label class="form-label" for="textAreaExample">Message</label>
                        </div>

                        <div class="form-outline">
                            <input type="url" name="recipeImage" id="recipeImage" class="form-control RecipeImage" required />
                            <label class="form-label" for="typeURL">URL de l'image de la recette</label>
                        </div>

                        <h2 class="h2Recipe">Tags et catégories</h2>
                        <div class="form-group">
                            <select class="custom-select" aria-placeholder="Selectionner une catégorie" name="selectCategorie" required>
                                <option value="">Sélectionner une catégorie pour votre recette</option>
                                <?php
                                include_once("../model/manager.php");
                                include_once("../model/category/category.php");
                                include_once("../model/category/categorymanager.php");
                                $cm = new CategoryManager();
                                foreach ($cm->getCategories() as $category) {
                                    echo "<option value=" . $category[0]->getId() . ">" . $category[0]->getTitle() . "</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <h2 class="text-center my-3 pb-3 h2Recipe">List des ingrédients</h2>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <select name="recipeIngredients" id="recipeIngredients" aria-placeholder="Selectionner un ingrédient" class="custom-select RecipeIngredients">
                                        <option value="">Sélectionner un ingrédient</option>
                                        <?php
                                        include_once("../model/manager.php");
                                        include_once("../model/ingredient/ingredient.php");
                                        include_once("../model/ingredient/ingredientmanager.php");
                                        $cm = new IngredientManager();
                                        foreach ($cm->getIngredients() as $ingredient) {
                                            echo "<option value=" . $ingredient->getId() . ">" . $ingredient->getName() . "</option>";
                                        }
                                        ?>
                                        <option>Créer un ingrédient</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col" id="ingredientNameCol">
                                <div class="form-outline">
                                    <input type="text" id="ingredientName" class="form-control">
                                    <label class="form-label" for="form8Example4">Nom de l'ingrédient</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-outline">
                                    <input type="number" name="ingredientWeight" id="ingredientWeight" class="form-control IngredientWeight" min="0" step="0.01" />
                                    <label class="form-label" for="form8Example5">Quantité</label>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-outline">
                                    <input type="text" name="ingredientWeightUnity" class="form-control ingredientWeightUnity" id="ingredientWeightUnity">
                                    <label class="form-label" for="form8Example5">Unité</label>
                                </div>
                            </div>

                            <div class="col">
                                <button type="button" class="btn btn-info" id="addIngredientButton">Ajouter un ingrédient</button>
                            </div>
                        </div>

                        <table class="table mb-4" id="ingredientArrayGlobal">
                            <thead>
                                <tr>
                                    <th scope="col">Numéro</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Quantité</th>
                                    <th scope="col">Unités</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="ingredientArray">
                            </tbody>
                        </table>
                        <div id="ingredientListDiv">
                            <h4>Liste des ingrédients</h4>
                            <div id="ingredientList">
                            </div>
                        </div>
                        <input type="submit" value="Créer ma recette" id="submitButton" class="btn btn-success btn-lg btn-block px-5 py-3 submitButtonCreationRecipe"></input>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="../../assets/scripts/RecipeCreation.js"></script>
<?php include_once('footer.php'); ?>