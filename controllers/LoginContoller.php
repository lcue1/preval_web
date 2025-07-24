<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/preval_web/includes/conexion.php";
class LoginController{
    public $mensaje = '';

    public function procesarLogin() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $usuario = $_POST["usuario"] ?? '';
            $contrasena = $_POST["contrasena"] ?? '';
            if (!empty($usuario) && !empty($contrasena)) {
                try {
                    $conexion = (new Conexion())->conectar();
                    $this->mensaje = "Inicio de sesión exitoso.";
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