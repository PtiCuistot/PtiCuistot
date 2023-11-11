<?php 

require_once('php/controllers/rCategory.php'); 
require_once('php/controllers/tCategory.php');
require_once('php/controllers/iCategory.php'); 
require_once('php/controllers/homepage.php');

if(isset($_GET['type']))
{
    $t = $_GET['type'];
    switch($t)
    {
        case 'c' : 
            cat_show_result();
            break; 

        case 't' : 
            title_show_result();
            break; 

        case 'i' : 
            ing_show_result();
            break;
            
        default : 
            homepage();
            break;
    }
}
else 
{
    homepage();
}

?>