<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Nos Recettes</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
        
        <link rel="stylesheet" href="../../assets/styles/style.css">
        <link rel="stylesheet" href="../../assets/styles/NavBar.css">
    </head>
    <?php include('header.php');?>
        
        <div class="container-fluid">
            <div class="px-lg-5">

                <!-- For demo purpose -->
                <div class="row py-5">
                    <div class="col-lg-12 mx-auto" style="color: white;">
                        <div class="p-5 shadow-sm rounded banner">
                            <h1 class="display-4">Nos Recettes</h1>
                            <p class="lead">Voici une liste de toutes nos recettes</p>
                            <p class="small">Classé de la plus récente a la plus ancienne</p>
                        </div>
                    </div>
                </div>
                <!-- End -->

                <div class="row" id="row">                
                </div>

                <div class="py-5 text-right"><a href="#" class="btn btn-dark px-5 py-3 text-uppercase" id="ButtonShowMoreRecipe">Show me more</a></div>
            </div>
        </div>

        <?php include('footer.php');?>
