<?php
class Conexion {
    private $host = "localhost";
    private $usuarioBD = "root";
    private $passwordDB = "";
    private $nombreBD = "preval";

    function conectar() {
        $coneccion = new mysqli($this->host, $this->usuarioBD, $this->passwordDB, $this->nombreBD);
        
        // Verifica si hay error
        if ($coneccion->connect_error) {
            die("Error de conexión: " . $coneccion->connect_error);
        }

        return $coneccion;
    }
}


?>