<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Nos Recettes</title>
    <?php include('link.php'); ?>
</head>
<?php include('header.php'); ?>

<h1 class="text-rainbow displayFlex" style="font-size: 5vw;margin-top: 25px;margin-bottom: 25px;">Page d'administration</h1>
<div class="highMargin">
    <div class="list-group AdminGroupe">
        <div class="svg-wrapper wrapperFormCreateRecipeTitle" style="width: auto;">
            <svg height="60" width="500" xmlns="http://www.w3.org/2000/svg" style="z-index: 5;">
                <rect class="shape" height="60" width="500" />
                <div class="text">En attente de validation</div>
            </svg>
        </div>
        <?php
        $rm = new RecipeManager();
        $um = new UserManager();
        $cm = new CommentManager();

        foreach ($rm->getUnvalidateRecipe() as $recipe) {
            echo '<a href="recipe.php?id=' . $recipe->getId() . '" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">' . $recipe->getTitle() . '</h5>
                            <small>Màj du : ' . $recipe->getUpdated()->format('d/m/y') . '</small>
                            </div>
                            <p class="mb-1">Recette de ' . $um->getUserById($recipe->getUserId())->getUsername() . '</p></a>';
        }
        ?>
        <div class="svg-wrapper wrapperFormCreateRecipeTitle" style="width: auto;">
            <svg height="60" width="500" xmlns="http://www.w3.org/2000/svg" style="z-index: 5;">
                <rect class="shape" height="60" width="500" />
                <div class="text">Liste des utilisateurs</div>
            </svg>
        </div>
        <table class="table table-striped">
            <thead>
                <tr class="table-dark">
                    <th scope="col">Nom d'utilisateur</th>
                    <th scope="col">Mail</th>
                    <th scope="col">Action</th>
                    
                </tr>
            </thead>
            <tbody>
            <?php
                foreach($um->getUsers() as $user)
                {
                    echo '<tr>';
                    echo '<td>'.$user->getUsername().'</td>';
                    echo '<td>'.$user->getEmail().'</td>';
                    echo '<td>
                        <form action="php/treatment/disable.php" method="POST">
                            <input type="number" name="userId" value="'.$user->getId().'" hidden>
                            <input type="submit" class="btn btn-danger SuppUserButton" value="Supprimer"/>
                        </form></td>';
                    echo '</tr>';

                }
            ?>
            </tbody>
        </table>
        <h3>Liste des commentaires non validés</h3>
        <table class="table table-striped">
            <thead>
                <tr class="table-dark">
                    <th scope="col">Contenu</th>
                    <th scope="col">Auteur</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach($cm->getUnvalidate() as $comment)
            {
                echo '<tr>';
                echo '<td>'.$comment->getContent().'</td>';
                echo '<td>'.$um->getUserById($comment->getUserId())->getUsername().'</td>';
                echo '<td>
                    <form action="php/treatment/delete_comment.php" method="POST">
                        <input type="number" name="commentId" value="'.$comment->getId().'" hidden>
                        <input type="submit" class="btn btn-danger" value="Supprimer le commentaire"/>
                    </form>
                    <br>
                    <form action="php/treatment/accept_comment.php" method="POST">
                        <input type="number" name="commentId" value="'.$comment->getId().'" hidden>
                        <input type="submit" class="btn btn-success" value="Valider le commentaire"/>
                    </form>
                    </td>';
                echo '</tr>';
            }
            ?>
            </tbody>
        </table>
    </div>
</div>


<?php include('footer.php'); ?>