<?php
class Contacto {
    private $nombre = null;
    private $correo = null;
    private $comentario = null;

    function __construct($name, $email, $content) {
        $this->nombre = $name;
        $this->correo = $email;
        $this->comentario = $content;
    }

    public function guardar($conexion) {
        try {
            $stmt = $conexion->prepare("INSERT INTO coments (name, email, coment, state, date) VALUES (?, ?, ?, 'E', NOW())");
            if (!$stmt) {
                throw new Exception("Error en prepare: " . $conexion->error);
            }
            if (!$stmt->bind_param("sss", $this->nombre, $this->correo, $this->comentario)) {
                throw new Exception("Error en bind_param: " . $stmt->error);
            }
            if (!$stmt->execute()) {
                 if ($stmt->errno == 1062) {
                    throw new Exception("Ya recibimos tu solicitud pronto nos contactaremos.");
                } else {
                    throw new Exception("Error en execute: " . $stmt->error);
                }
            }
            $stmt->close();
            return true;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
?>