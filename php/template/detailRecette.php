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
        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    </head>
    <?php include('header.php'); ?>
    <section style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="card rounded-3" style="text-align: center;">
                    <div class="card-body p-4 displayFlex">

                        <div class="lineDetailRecipe displayFlex">
                            <h1 class="display-3 RecipeTitle text-reflect"><?php echo $recipe->getTitle(); ?></h1>
                            <hr>
                        </div>

                        <?php
                            $tags = $rm->getTag($recipe);
                            echo '<div class="tagsDetailRecipe displayFlex">';
                            foreach ($tags as $tag) {
                                echo '<div class="badge badge-danger px-3 rounded-pill font-weight-normal text-dark" style="color: red !important;">' . $tag->getContent() . '</div>';
                            }
                            echo '</div>';
                        ?>

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
                            <table class="table mb-4 table-striped" id="ingredientArrayGlobal">
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

                            <div class="svg-wrapper wrapperFormCreateRecipeTitle" style="width: auto;">
                                <svg height="60" width="500" xmlns="http://www.w3.org/2000/svg" style="z-index: 5;">
                                    <rect class="shape" height="60" width="500" />
                                    <div class="text">Recette</div>
                                </svg>
                            </div>
                            <div class="bg-white rounded shadow-sm p-4" style="border: 1px solid black;">
                                <div id="recipeContent"><?php echo $recipe->getContent(); ?></div>
                            </div>
                        </div>

                        <?php if (isset($_SESSION['admin']) && $recipe->getValidate() == 0) : ?>
                            <div class="svg-wrapper wrapperFormCreateRecipeTitle" style="width: auto;">
                                <svg height="60" width="500" xmlns="http://www.w3.org/2000/svg" style="z-index: 5;">
                                    <rect class="shape" height="60" width="500" />
                                    <div class="text">Action Administrateur</div>
                                </svg>
                            </div>
                            <form method="POST" action="php/treatment/accept_recipe.php" style="width: 80%;">
                                <input name='recipeId' value="<?php echo $recipe->getId() ?>" hidden>
                                <input class="btn btn-success" type="submit" value="Valider la recette"  style="width: 100%;">
                            </form>
                            <form method="POST" action="php/treatment/delete_recipe.php" style="width: 80%;">
                                <input name='recipeId' value="<?php echo $recipe->getId() ?>" hidden>
                                <input class="btn btn-warning" type="submit" value="Valider la recette"  style="width: 100%;">
                            </form>
                        <?php endif; ?>

                        <?php if (isset($_SESSION['userId']) && $recipe->getUserId() == intval($_SESSION['userId'])||isset($_SESSION['admin'])) : ?>
                            <form method="POST" action="php/treatment/delete_recipe.php" style="width: 80%;">
                                <input name='recipeId' value="<?php echo $recipe->getId() ?>" hidden>
                                <input class="btn btn-warning" type="submit" value="Supprimer la recette"  style="width: 100%;">
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
                            if((isset($_SESSION['userId']) && $recipe->getUserId() == intval($_SESSION['userId'])||isset($_SESSION['admin'])))
                            {
                                echo '
                                <div class="displayFlex CommentsDetailRecipe">
                                    <p>'.$comment->getContent().'</p>
                                    <p>Posté par '.$um->getUserById($comment->getUserId())->getUsername().'</p>.
                                    <form action="php/treatment/delete_comment.php" method="POST">
                                        <input type="number" name="commentId" value="'.$comment->getId().'" hidden>
                                        <input type="submit" class="btn btn-danger SuppUserButton" value="Supprimer le commentaire"/>
                                    </form>
                                </div>';
                            }
                            else
                            {
                                echo '<div class="displayFlex CommentsDetailRecipe">
                                <p>'.$comment->getContent().'</p>
                                <p>Posté par '.$um->getUserById($comment->getUserId())->getUsername().'</p>.
                                </div>';
                            }

                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
    let options = {
        placeholder: 'Description de la recette',
        readOnly: true,
        modules:
        {
            "toolbar" : false
        },
        theme: 'snow'
        };
    var quill = new Quill('#recipeContent', options);
    </script>

    <?php include('footer.php'); ?>
<?php else: ?>
    <?php include('404.php'); ?>
<?php endif; ?>