<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Nos Recettes</title>
        <?php include('link.php'); ?>
    </head>
        <?php include('header.php');?>

        <h1>Recette en attente de validation</h1>
        <div class = "highMargin">
            <div class="list-group">

            <?php             
                $rm = new RecipeManager(); 
                $um = new UserManager();


                foreach($rm->getUnvalidateRecipe() as $recipe)
                {
                    echo '<a href="https://dev-baratin221.users.info.unicaen.fr/PtiCuistot/php/template/detailRecette.php?id='.$recipe->getId().'" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">'.$recipe->getTitle().'</h5>
                            <small>Màj du : '.$recipe->getUpdated()->format('d/m/y').'</small>
                            </div>
                            <p class="mb-1">Recette de '.$um->getUserById($recipe->getUserId())->getUsername().'</p></a>';   
                }

            ?>

            </div>
        </div>
            

        <?php include('footer.php');?>