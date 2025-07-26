<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/preval_web/includes/conexion.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/preval_web/models/Login.php";
class LoginController{
    public $mensaje = null;

    public function procesarLogin() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $userName = $_POST["userName"] ?? '';
            $password = $_POST["password"] ?? '';
            if (!empty($userName) && !empty($password)) {
                try {
                    $conexion = (new Conexion())->conectar();
                    $login = new Login($userName, $password);
                    if ($login->autenticate($conexion)) {
                        session_start();
                        $_SESSION["name"] = $login->getName();
                        $_SESSION["rolId"] = $login->getRolId();
                        header("Location: /preval_web/public/system/dashboard.php");
                        exit();
                    } else {
                        $this->mensaje = "Usuario o contraseña incorrectos.";
                    }
                } catch (Exception $e) {
                    $this->mensaje = "Error: " . $e->getMessage();
                }
            } else {
                $this->mensaje = "Usuario y contraseña son obligatorios.";
            }
        }
    }
}



?>