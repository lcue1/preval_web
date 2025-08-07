<?php 
require_once $_SERVER['DOCUMENT_ROOT']."/preval_web/controllers/EmployerController.php";
$employerController = new EmployerController();
$employerController->processRequest();
$employers = $employerController->getEmployers();
$rols = $employerController->getRols();
//var_dump($rols);
require_once $_SERVER['DOCUMENT_ROOT']."/preval_web/views/system/employer.php";


?>