<?php if ($recipe != null) : ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <?php
        if ($recipe != null) {
            echo '<title>' . $recipe->getTitle() . '</title>';
        }
        ?>
        <?php include('link.php'); ?>
    </head>
    <?php include('header.php'); ?>
    <section style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="card rounded-3" style="text-align: center;">
                    <div class="card-body p-4 displayFlex">

                        <div class="lineDetailRecipe displayFlex">
                            <h1 class="display-3 RecipeTitle"><?php echo $recipe->getTitle(); ?></h1>
                            <hr>
                        </div>

                        <div class="lineDetailRecipe displayFlex">
                            <img src="<?php echo $recipe->getImage(); ?>" height="650px" class="imgRecipeDisplay" alt="Image de la recette">
                            <hr class="line2">
                        </div>
                        
                        <div class="CreateByRecipeDetail displayFlex">
                            <h2><i>Une recette de <?php echo $um->getUserById($recipe->getUserId())->getUsername(); ?></i></h2>
                            <hr class="CreateByRecipeDetailHR1">
                            <p>Dernière Mise à jour : <?php echo $recipe->getUpdated()->format('d/m/Y') ?> </p>
                        </div>
                        <hr class="CreateByRecipeDetailHR2">

                        <div class="container">
                            <div class="svg-wrapper wrapperFormCreateRecipeTitle" style="width: auto;">
                                <svg height="60" width="500" xmlns="http://www.w3.org/2000/svg" style="z-index: 5;">
                                    <rect class="shape" height="60" width="500" />
                                    <div class="text">Liste des ingrédients</div>
                                </svg>
                            </div>
                            <table class="table mb-4" id="ingredientArrayGlobal">
                                <thead>
                                    <tr class="table-dark">
                                        <th scope="col">Nom</th>
                                        <th scope="col">Quantité</th>
                                        <th scope="col">Unités</th>
                                    </tr>
                                </thead>
                                <tbody id="ingredientArray">
                                    <?php
                                    foreach ($rm->getRecipeIngredients($recipe) as $row) {
                                        echo '
                                        <tr>
                                            <td>' . $row['ing_name'] . '</td>
                                            <td>' . $row['iw_weight'] . '</td>
                                            <td>' . $row['iw_unity'] . '</td>
                                        </tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>

                            <div class="displayFlex">
                                <hr class="CreateByRecipeDetailHR2">
                            </div>
                            <div class="svg-wrapper wrapperFormCreateRecipeTitle" style="width: auto;">
                                <svg height="60" width="500" xmlns="http://www.w3.org/2000/svg" style="z-index: 5;">
                                    <rect class="shape" height="60" width="500" />
                                    <div class="text">Recette</div>
                                </svg>
                            </div>
                            <div class="bg-white rounded shadow-sm p-4" style="border: 1px solid black;">
                                <p class="RecipeContent"><?php echo $recipe->getContent(); ?></p>
                            </div>
                        </div>


                        <?php if(isset($_SESSION['userId']) && (intval($_SESSION['userId']) == intval($recipe->getUserId()))) : ?>
                            <h2 class="h2Recipe">Action créateur</h2>
                            <form>
                                <input name='recipeId' value="<?php echo $recipe->getId() ?>" hidden>
                                <input class="btn btn-success" type="submit" value="Mettre à jour ma recette">
                            </form>
                        <?php endif; ?>

                        <?php if (isset($_SESSION['admin']) && $recipe->getValidate() == 0) : ?>
                            <h2 class="h2Recipe">Action Administrateur</h2>
                            <form method="POST" action="php/treatment/accept_recipe.php">
                                <input name='recipeId' value="<?php echo $recipe->getId() ?>" hidden>
                                <input class="btn btn-success" type="submit" value="Valider la recette">
                            </form>
                        <?php endif; ?>

                        <?php if (isset($_SESSION['userId'])) : ?>
                            <div class="svg-wrapper wrapperFormCreateRecipeTitle" style="width: auto;">
                                <svg height="60" width="500" xmlns="http://www.w3.org/2000/svg" style="z-index: 5;">
                                    <rect class="shape" height="60" width="500" />
                                    <div class="text">Commentaires</div>
                                </svg>
                            </div>
                            <form action="php/treatment/send_comment.php" class="formCommentsRecipeDetail displayFlex" method="POST">
                                <input name='recipeId' value="<?php echo $recipe->getId() ?>" hidden>
                                <div class="form-outline commentFormDiv">
                                    <textarea name='comment' class="form-control RecipeContent" id="recipeComment" rows="4" required></textarea>
                                    <label class="form-label" for="textAreaExample">Laisser un commentaire</label>
                                </div>
                                <input type="submit"  class="btn btn-info CommentValidateButton" value="Valider le commentaire"/>
                            </form>
                         <?php endif; ?>

                        <?php
                        foreach($commentList as $comment)
                        {
                            echo '<div class="displayFlex CommentsDetailRecipe"><p>'.$comment->getContent().'</p><p>Posté par '.$um->getUserById($comment->getUserId())->getUsername().'</p></div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include('footer.php'); ?>
<?php else: ?>
    <?php include('404.php'); ?>
<?php endif; ?>