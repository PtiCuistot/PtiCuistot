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
    <div class="list-group">
        <h3>Recette en attente de validation</h3>
        <?php
        $rm = new RecipeManager();
        $um = new UserManager();


        foreach ($rm->getUnvalidateRecipe() as $recipe) {
            echo '<a href="recipe.php?id=' . $recipe->getId() . '" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">' . $recipe->getTitle() . '</h5>
                            <small>Màj du : ' . $recipe->getUpdated()->format('d/m/y') . '</small>
                            </div>
                            <p class="mb-1">Recette de ' . $um->getUserById($recipe->getUserId())->getUsername() . '</p></a>';
        }
        ?>
        <h3>Liste des utilisateurs</h3>
        <table class="table table-striped">
            <thead>
                <tr class="table-dark">
                    <th scope="col">Nom d'utilisateur</th>
                    <th scope="col">Mail</th>
                    <th scope="col">Action</th>
                    
                </tr>
            </thead>
            <tbody id="ingredientArray">
            <?php
                foreach($um->getUsers() as $user)
                {
                    echo '<tr>';
                    echo '<td>'.$user->getUsername().'</td>';
                    echo '<td>'.$user->getEmail().'</td>';
                    echo '<td>
                        <form action="php/treatment/disable.php" method="POST">
                            <input type="number" name="userId" value="'.$user->getId().'" hidden>
                            <input type="submit" class="btn btn-danger" value="Supprimer le compte"/>
                        </form></td>';

                }
            ?>
            </tbody>
        </table>

    </div>
</div>


<?php include('footer.php'); ?>