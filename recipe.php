<?php 
    require_once('php/controllers/createRecipe.php'); 
    require_once('php/controllers/listRecipe.php'); 
    require_once('php/controllers/login.php'); 
    require_once('php/controllers/detailRecipe.php'); 
    
    if(isset($_GET['action']))
    {
        if($_GET['action'] == 'create')
        {
            return createRecipe();
        }
    }


    if(isset($_GET['id']))
    {
        return detailRecipe();
    }


    return listRecipe();
        
?>