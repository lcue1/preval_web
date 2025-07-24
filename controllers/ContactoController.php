<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/preval_web/includes/conexion.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/preval_web/models/Contacto.php";

class ContactoController
{ 
    public $message = null;

    public function procesarFormulario()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST["name"] ?? '';
            $email = $_POST["email"] ?? '';
            $coment = $_POST["coment"] ?? '';
            if (!empty($name) && !empty($email) && !empty($coment)) {
                try {
                    $conexion = (new Conexion())->conectar();
                    $contacto = new Contacto($name, $email, $coment);
                    if($contacto->guardar($conexion)) {
                        $this->message = "Mensaje enviado correctamente.";
                    } 
                    $conexion->close();
                } catch (Exception $e) {
                    $this->message =$e->getMessage();
                }
            }else{
                $this->message = "Todos los campos son obligatorios.";
            }
        }
    }
}
