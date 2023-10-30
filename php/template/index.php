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
                <div class="inner-div">
                    <img src="" alt="Image Recette">
                    <p>AAA</p>
                </div>
                <div class="Edito">
                    <div class="center">
                        <img src="assets/images/Pticuisto.png" alt="PtiCuisto img">
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer imperdiet congue neque non vulputate. Duis ultricies iaculis tincidunt. Vivamus a pellentesque sem. Nam tempus et metus in tempor. Nunc venenatis, risus fermentum sagittis vestibulum, eros nibh vehicula quam, in mattis augue lorem in magna. Nullam id nibh interdum, accumsan tellus sit amet, imperdiet turpis. Morbi ullamcorper dui ut ligula dignissim porttitor. Pellentesque quam libero, vehicula vitae fermentum eget, volutpat sit amet magna. Sed aliquet, purus non mattis semper, velit tortor dapibus mi, in tempor urna lacus sagittis ligula.
                    </p>
                </div>
            </div>
        </div>
        <div class="Edito">
            <div class="center">
                <img src="../../assets/images/Pticuisto.png" alt="PtiCuisto img">
            </div>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer imperdiet congue neque non vulputate. Duis ultricies iaculis tincidunt. Vivamus a pellentesque sem. Nam tempus et metus in tempor. Nunc venenatis, risus fermentum sagittis vestibulum, eros nibh vehicula quam, in mattis augue lorem in magna. Nullam id nibh interdum, accumsan tellus sit amet, imperdiet turpis. Morbi ullamcorper dui ut ligula dignissim porttitor. Pellentesque quam libero, vehicula vitae fermentum eget, volutpat sit amet magna. Sed aliquet, purus non mattis semper, velit tortor dapibus mi, in tempor urna lacus sagittis ligula.
            </p>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>