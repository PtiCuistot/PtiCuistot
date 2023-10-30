<?php 
    require_once('php/controllers/createRecipe.php'); 
    require_once('php/controllers/listRecipe.php'); 
    require_once('php/controllers/login.php'); 

    
    if(isset($_GET['action']))
    {
        if($_GET['action'] == 'create')
        {
            if(isset($_SESSION['userId']))
            {
                return createRecipe();
            }
            else
            {
                return login();
            }
        }
    }

    else
    {
        return listRecipe();
    }
?>