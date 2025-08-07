<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/preval_web/controllers/CommentsController.php';

$commentController = new CommentsController();
$comments = $commentController->processRequest  ();
$comments = $commentController->getComments();

require_once $_SERVER['DOCUMENT_ROOT'].'/preval_web/views/system/comments.php';


?>