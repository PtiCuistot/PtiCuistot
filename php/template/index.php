<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Accueil</title>
        <?php include('link.php');?>

    </head>
        <?php include('header.php');?>


<div class="Content">
    <div>

    </div>
    <div class="TwoRow">
        <div class="DernieresRecettes">
            <div class="svg-wrapper">
                <svg height="60" width="500" xmlns="http://www.w3.org/2000/svg" style="z-index: 5;">
                    <rect class="shape" height="60" width="500"/>
                    <div class="text">LES DERNIÈRES RECETTES</div>
                </svg>
            </div>
            <div class="scrollable-div">
                <?php
                    $rm = new RecipeManager();
                    foreach ($rm->getRecipes(10) as $recipe) 
                    {
                        echo '
                        <div class="inner-div">
                            <img src="'.$recipe->getImage().'" alt="Image Recette">
                            <p>'.$recipe->getTitle().'</p>
                        </div>
                        ';
                    }
                ?>
            </div>
        </div>
        <div class="Edito">
            <div class="center">
                <img src="assets/images/Pticuisto.png" alt="PtiCuisto img">
            </div>
            <p>
            Bien sûr, voici l'édito pour le site PtiCuisto avec une écriture inclusive :

Salut à tou·te·s,

Bienvenue sur PtiCuisto, l'endroit idéal pour les amoureux·ses de la cuisine en quête d'inspiration. Ici, pas de formalités ni de recettes complexes, juste de la cuisine accessible à tou·te·s, quel que soit votre âge.

Sur PtiCuisto, nous sommes tou·te·s là pour apprendre et partager sans crainte de la critique. C'est un espace où l'expérimentation est encouragée, les erreurs sont des opportunités d'apprentissage, et les succès sont à célébrer ensemble.

Alors, prenez votre tablier, lancez-vous en cuisine, et rejoignez la communauté PtiCuisto pour un voyage culinaire rempli de découvertes, de plaisirs gustatifs et de partage. Nous avons hâte de voir vos créations et d'entendre vos idées, car PtiCuisto, c'est avant tout une grande famille de passionné·e·s de cuisine, curieux·ses et anonymes.

Bonne cuisine et à bientôt sur PtiCuisto !

L'équipe de PtiCuisto
            </p>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>