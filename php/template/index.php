<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <?php include('link.php'); ?>

</head>
<?php include('header.php'); ?>
<?php include('popup.php'); ?>

<div class="Content">
    <div>
        <div class="Row">
            <div class="line">
                <img src="assets/images/cooking.gif" alt="Child Happy">
                <hr>
            </div>
        </div>
        <div class="Row row2">
            <div class="line">
                <img src="assets/images/cookChild.png" alt="Child Cooking">
                <hr>
            </div>
        </div>
    </div>

    <div class="TwoRow">
        <div class="DernieresRecettes">
            <div class="svg-wrapper">
                <svg height="60" width="500" xmlns="http://www.w3.org/2000/svg" style="z-index: 5;">
                    <rect class="shape" height="60" width="500" />
                    <div class="text">LES DERNIÈRES RECETTES</div>
                </svg>
            </div>

            <div id="carouselMaterialStyle" class="carousel slide carousel-fade" data-mdb-ride="carousel">
                <div class="carousel-indicators">
                    <?php
                    $rm = new RecipeManager();
                    $recipes = $rm->getRecipes(5);

                    for ($i = 0; $i < count($recipes); $i++) {
                        $isActive = $i === 0 ? 'active' : '';
                        echo '
                                <button type="button" data-mdb-target="#carouselMaterialStyle" data-mdb-slide-to="' . $i . '" class="' . $isActive . '" aria-current="true" aria-label="Slide ' . ($i + 1) . '"></button>
                            ';
                    }
                    ?>
                </div>
                <div class="carousel-inner rounded-5 shadow-4-strong">
                    <?php
                    foreach ($recipes as $key => $recipe) {
                        $isActive = $key === 0 ? 'active' : '';
                        echo '
                                <div class="carousel-item ' . $isActive . '">
                                    <img src="' . $recipe->getImage() . '" class="d-block w-100" alt="Image Recette">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>' . $recipe->getTitle() . '</h5>
                                    </div>
                                </div>
                            ';
                    }
                    ?>
                </div>
                <button class="carousel-control-prev carouselOpacity" type="button" data-mdb-target="#carouselMaterialStyle" data-mdb-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next carouselOpacity" type="button" data-mdb-target="#carouselMaterialStyle" data-mdb-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

        </div>
        <div class="Edito">
            <div class="center">
                <img src="assets/images/Pticuisto.png" alt="PtiCuisto img">
            </div>
            <div id="container" style="width: 100%;">
                <div id="message">
                    <a id="animate" href="#" style="display : none">Transmit</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="assets/scripts/scriptIndex.js"></script>
<?php include('footer.php'); ?>