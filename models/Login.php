<?php
class Login{
    private $userName = null;
    private $password = null;
    private $name = null;
    public $rolId = null;
    public function __construct($userName, $password) {
        $this->userName = $userName;
        $this->password = $password;
    }
    public function autenticate($conexion) {
        try {
            $stmt = $conexion->prepare("SELECT e.userNameEmployer, e.password, e.name, er.rolId FROM employer e
            JOIN employerrol er ON e.rolId = er.rolId WHERE e.userNameEmployer = ? ". "AND e.password = ?");
            if (!$stmt) {
                throw new Exception("Error en prepare: " . $conexion->error);
            }
            if (!$stmt->bind_param("ss", $this->userName, $this->password)) {
                throw new Exception("Error en bind_param: " . $stmt->error);
            }
            if (!$stmt->execute()) {
                throw new Exception("Error en execute: " . $stmt->error);
            }
            $resultado = $stmt->get_result();
            if ($resultado->num_rows > 0) {
                $usuario = $resultado->fetch_object();
                $this->rolId = $usuario->rolId;
                $this->name = $usuario->name;
                return true; // Autenticación exitosa
            } else {
                return false; // Usuario o contraseña incorrectos
            }
            
        } catch (Exception $e) {
            throw $e;
        } finally {
            if (isset($stmt)) {
                $stmt->close();
            }
        }
    }
    public function getName() {
        return $this->name;
    }
    public function getRolId() {
        return $this->rolId;
    }
}



?>