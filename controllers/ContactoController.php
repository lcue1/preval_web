<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/preval_web/models/Contacto.php";

class ContactoController {
    public $mensaje = '';

    public function procesarFormulario() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST["nombre"] ?? '';
            $correo = $_POST["correo"] ?? '';
            $comentario = $_POST["comentario"] ?? '';

            if (!empty($nombre) && !empty($correo) && !empty($comentario)) {
                if (Contacto::guardar($nombre, $correo, $comentario)) {
                    $this->mensaje = "Mensaje enviado correctamente.";
                } else {
                    $this->mensaje = "Error al enviar el mensaje.";
                }
            } else {
                $this->mensaje = "Por favor, complete todos los campos.";
            }
        }
    }
}