<?php 

$id = $_GET['id'];
include_once "../controller/forumC.php";

$forumC= new forumC();
$forumC->deleteComment($id); 
header('Location:afficher_comments.php');




?>