<?php 
    require_once('php/controllers/createRecipe.php'); 
    require_once('php/controllers/listRecipe.php'); 

    
    if(isset($_GET['action']))
    {
        if($_GET['action'] == 'create')
        {
            return createRecipe();
        }
    }

    else
    {
        return listRecipe();
    }
?>