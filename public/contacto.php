<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/preval_web/controllers/ContactoController.php";
$controller = new ContactoController();
$controller->procesarFormulario();
$message = $controller->message; 
include $_SERVER["DOCUMENT_ROOT"]."/preval_web/views/contacto.php";
?>