<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/preval_web/controllers/QuotationController.php';

$controller = new QuotationController();

$controller->processRequest();


?>