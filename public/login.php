<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/preval_web/controllers/LoginController.php";
$loginController = new LoginController();
$loginController->procesarLogin();
$mensaje = $loginController->mensaje;

 require_once $_SERVER['DOCUMENT_ROOT'] . "/preval_web/views/login.php"; 
 
 
 
 ?>
