<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/preval_web/includes/conexion.php";

class Contacto {
    public static function guardar($nombre, $correo, $comentario) {
        $conexion = (new Conexion())->conectar();
        var_dump($nombre); 
        var_dump($correo); 
        var_dump($comentario); 
        exit();
        $stmt = $conexion->prepare("INSERT INTO contacto (nombre, correo, comentario) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nombre, $correo, $comentario);
        $resultado = $stmt->execute();
        $stmt->close();
        $conexion->close();
        return $resultado;
    }
}

?>