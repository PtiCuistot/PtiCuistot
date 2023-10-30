<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Nos Recettes</title>
    <?php include('link.php'); ?>
</head>
<?php include('header.php'); ?>

<div class="container-fluid">
    <div class="px-lg-5">
        <div class="row py-5">
            <div class="col-lg-12 mx-auto" style="color: white;">
                <div class="p-5 shadow-sm rounded banner">
                    <h1 class="display-4">Nos Recettes</h1>
                    <p class="lead">Voici une liste de toutes nos recettes</p>
                    <p class="small">Classé de la plus récente a la plus ancienne</p>
                </div>
            </div>
        </div>

        <div class="row" id="row">
        </div>

        <div class="py-5 text-right"><a href="#" class="btn btn-dark px-5 py-3 text-uppercase" id="ButtonShowMoreRecipe">Show me more</a></div>
    </div>
</div>
<script src="../../assets/scripts/scriptRecipe.js"></script>
<?php include('footer.php'); ?>
