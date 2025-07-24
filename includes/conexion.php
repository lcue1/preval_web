<?php
class Conexion {
    private $host = "localhost";
    private $usuarioBD = "root";
    private $passwordDB = "";
    private $nombreBD = "preval";

    function conectar() {
        try {
            $coneccion = new mysqli($this->host, $this->usuarioBD, $this->passwordDB, $this->nombreBD);
            if ($coneccion->connect_error) {
                throw new Exception("DB: " . $coneccion->connect_error);
            }
            return $coneccion;
        } catch (Exception $e) {
            // Puedes lanzar la excepción para que el controlador la maneje
            throw $e;
        }
    }
}
?>