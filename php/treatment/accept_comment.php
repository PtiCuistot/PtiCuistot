<?php 

include_once("../database/connector.php");
include_once("../model/manager.php");
include_once("../model/comment/comment.php");
include_once("../model/comment/commentmanager.php");

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $cm = new CommentManager();
    $recipe = $cm->getCommentById(intval($_POST['commentId'])); 
    $cm->validate($recipe);
    
}
header('location: ../../admin.php');


?>