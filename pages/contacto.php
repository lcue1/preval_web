<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/preval_web/controllers/ContactoController.php";
$controller = new ContactoController();
$controller->procesarFormulario();
$mensaje = $controller->mensaje;
include $_SERVER["DOCUMENT_ROOT"]."/preval_web/views/contacto.php";
?>