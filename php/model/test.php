<?php

include_once("manager.php");
include_once("category/categorymanager.php");
include_once("category/category.php");

$cat = new Category("Juice", "A juicy red fruit", 1);
$catMan = new CategoryManager();
$catMan->insertCategory($cat);  

?>