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
                        <div class="CreateRecipeTitleDiv">
                            <i class="fa-solid fa-utensils"></i>
                            <h1 class="CreateRecipeTitle">Création de recettes</h1>
                            <i class="fa-solid fa-pizza-slice"></i>
                        </div>
                        <div class="svg-wrapper wrapperFormCreateRecipeTitle" style="width: auto;">
                            <svg height="60" width="500" xmlns="http://www.w3.org/2000/svg" style="z-index: 5;">
                                <rect class="shape" height="60" width="500" />
                                <div class="text">Informations de la recette</div>
                            </svg>
                        </div>
                        <div class="bg-white rounded shadow-sm p-4" style="border: 1px solid black;">
                            <div class="form-outline">
                                <input name="recipeTitle" type="text" id="recipeTitle" class="form-control" required>
                                <label class="form-label" for="form8Example4">Nom de la recette</label>
                            </div>

                            <div class="form-outline">
                                <textarea class="form-control RecipeContent" id="recipeContent" rows="4" required></textarea>
                                <label class="form-label" for="textAreaExample">Description de la recette</label>
                            </div>

                            <div class="form-outline">
                                <input type="url" name="recipeImage" id="recipeImage" class="form-control RecipeImage" required />
                                <label class="form-label" for="typeURL">URL de l'image de la recette</label>
                            </div>
                        </div>

                        <div class="svg-wrapper wrapperFormCreateRecipeTitle" style="width: auto;">
                            <svg height="60" width="500" xmlns="http://www.w3.org/2000/svg" style="z-index: 5;">
                                <rect class="shape" height="60" width="500" />
                                <div class="text">Tags et catégories</div>
                            </svg>
                        </div>
                        <div class="bg-white rounded shadow-sm p-4" style="border: 1px solid black;">
                            <div class="form-group">
                                <select class="custom-select" aria-placeholder="Selectionner une catégorie" id="recipeCategory" name="selectCategorie" required>
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
                        </div>

                        <div class="svg-wrapper wrapperFormCreateRecipeTitle" style="width: auto;">
                            <svg height="60" width="500" xmlns="http://www.w3.org/2000/svg" style="z-index: 5;">
                                <rect class="shape" height="60" width="500" />
                                <div class="text">List des ingrédients</div>
                            </svg>
                        </div>

                        <div class="row bg-white rounded shadow-sm p-4" style="border: 1px solid black;">
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
                                    <label class="form-label" for="form8Example6">Quantité</label>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-outline">
                                    <input type="text" name="ingredientWeightUnity" class="form-control ingredientWeightUnity" id="ingredientWeightUnity">
                                    <label class="form-label" for="form8Example5">Unité</label>
                                </div>
                            </div>

                            <div class="col">
                                <button type="button" class="btn btn-info" id="addIngredientButton" disabled>Ajouter un ingrédient</button>
                            </div>

                            <table class="table table-striped" id="ingredientArrayGlobal">
                                <thead>
                                    <tr class="table-dark">
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
                        </div>

                        <input type="submit" value="Créer ma recette" id="submitButton" class="btn btn-success btn-lg btn-block px-5 py-3 submitButtonCreationRecipe" disabled></input>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="../../assets/scripts/RecipeCreation.js"></script>
<?php include_once('footer.php'); ?>