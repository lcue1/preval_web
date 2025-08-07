<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/preval_web/controllers/ProductController.php";
$productController = new ProductController();
$productController->processRequest();
$products = $productController->getProducts();

require_once $_SERVER["DOCUMENT_ROOT"]."/preval_web/views/system/product.php";


?>