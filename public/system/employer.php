<?php 
require_once $_SERVER['DOCUMENT_ROOT']."/preval_web/controllers/EmployerController.php";
$employerController = new EmployerController();
$employerController->processRequest();
$employers = $employerController->getEmployers();
$message = $employerController->getMessage();
var_dump($employers);
var_dump($message);
require_once $_SERVER['DOCUMENT_ROOT']."/preval_web/views/system/employer.php";


?>