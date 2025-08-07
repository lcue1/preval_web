<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/preval_web/includes/auth.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/preval_web/utils/FlashMessage.php";
class ProductController
{
    private $products = null;
    function __construct()
    {
        require_once $_SERVER["DOCUMENT_ROOT"] . "/preval_web/includes/auth.php";
        verifySession();
    }

    public function processRequest()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            if (isset($_GET['productId'])) {
                $this->delete();
                return;
            }
            $this->processGetRequest();
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['operation']) && $_POST['operation'] === 'save') {
                $this->save();
            }elseif (isset($_POST['operation']) && $_POST['operation'] === 'update') {
                $this->update();
            }
        }
    }
    private function processGetRequest()
    {
        try {
            require_once $_SERVER["DOCUMENT_ROOT"] . "/preval_web/includes/conexion.php";
            require_once $_SERVER["DOCUMENT_ROOT"] . "/preval_web/models/Product.php";
            $conexion = (new Conexion())->conectar();
            $productModel = new Product();
            $this->products = $productModel->getAllProducts($conexion);
        } catch (Exception $e) {
            FlashMessage::set('error', $e->getMessage());
        } finally {
            if (isset($conexion) && $conexion instanceof mysqli) {
                $conexion->close();
            }
        }
    }
    public function getProducts()
    {
        return $this->products;
    }
    private function save()
    {
        try {
            require_once $_SERVER["DOCUMENT_ROOT"] . "/preval_web/includes/conexion.php";
            require_once $_SERVER["DOCUMENT_ROOT"] . "/preval_web/models/Product.php";
            $conexion = (new Conexion())->conectar();
            $productModel = new Product();
            $productData = [
                'productName' => $_POST['productName'],
                'quantity' => $_POST['quantity'],
                'material' => $_POST['material']
            ];
            foreach ($productData as $key => $value) {
                if (empty($value)) {
                    throw new Exception("Todos los campos son obligatorios.");
                }
            }
            if($productModel->saveProduct($conexion, $productData)!== true) {
                FlashMessage::set('error', 'Error al guardar el producto.');
                header("Location: /preval_web/public/system/product.php");
                exit();
            }
            FlashMessage::set('success', 'Producto guardado correctamente.');
            header("Location: /preval_web/public/system/product.php");
            exit();
        } catch (Exception $e) {
            FlashMessage::set('error', $e->getMessage());
            header("Location: /preval_web/public/system/product.php");
            exit();
        }
    }
    private function update()
    {
        try {
            require_once $_SERVER["DOCUMENT_ROOT"] . "/preval_web/includes/conexion.php";
            require_once $_SERVER["DOCUMENT_ROOT"] . "/preval_web/models/Product.php";
            $conexion = (new Conexion())->conectar();
            $productData = [
                'productId' => $_POST['productId'],
                'productName' => $_POST['productName'],
                'quantity' => $_POST['quantity'],
                'material' => $_POST['material']
            ];
            foreach($productData as $key => $value) {
                if (empty($value)) {
                    throw new Exception("Todos los campos son obligatorios.");
                }
            }
            $productModel = new Product();
            if ($productModel->updateProduct($conexion, $productData) !== true) {
                FlashMessage::set('error', 'Error al actualizar el producto.');
                header("Location: /preval_web/public/system/product.php");
                exit();
            }
            FlashMessage::set('success', 'Producto actualizado correctamente.');
            header("Location: /preval_web/public/system/product.php");
            exit();
        } catch (Exception $e) {
            FlashMessage::set('error', $e->getMessage());
            header("Location: /preval_web/public/system/product.php");
            exit();
        }
    }

    public function delete(){
        try {
            $productId = $_GET['productId'] ?? '';
            if (empty($productId)) {
                throw new Exception("ID del producto no proporcionado.");
            }
            require_once $_SERVER["DOCUMENT_ROOT"] . "/preval_web/includes/conexion.php";
            require_once $_SERVER["DOCUMENT_ROOT"] . "/preval_web/models/Product.php";
            $conexion = (new Conexion())->conectar();
            $productModel = new Product();
            if ($productModel->deleteProduct($conexion, $productId) !== true) {
                FlashMessage::set('error', 'Error al eliminar el producto.');
                header("Location: /preval_web/public/system/product.php");
                exit();
            }
            FlashMessage::set('success', 'Producto eliminado correctamente.');
            header("Location: /preval_web/public/system/product.php");
            exit();
        } catch (Exception $e) {
            FlashMessage::set('error', $e->getMessage());
            header("Location: /preval_web/public/system/product.php");
            exit();
        }
    }
}
