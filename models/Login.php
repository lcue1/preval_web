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
        // 1. Primero buscamos SOLO por nombre de usuario
        $stmt = $conexion->prepare("
            SELECT e.userNameEmployer, e.password, e.name, er.rolId 
            FROM employer e
            JOIN employerrol er ON e.rolId = er.rolId 
            WHERE e.userNameEmployer = ? AND e.state = 'A'
        ");
        
        if (!$stmt) {
            throw new Exception("Error en prepare: " . $conexion->error);
        }
        
        if (!$stmt->bind_param("s", $this->userName)) {
            throw new Exception("Error en bind_param: " . $stmt->error);
        }
        
        if (!$stmt->execute()) {
            throw new Exception("Error en execute: " . $stmt->error);
        }
        
        $resultado = $stmt->get_result();
        if ($resultado->num_rows === 1) {
            $usuario = $resultado->fetch_object();
            
            // 2. Verificamos la contraseña con el hash almacenado
            if (password_verify($this->password, $usuario->password)) {
                $this->rolId = $usuario->rolId;
                $this->name = $usuario->name;
                return true; // Autenticación exitosa
            }
        }
        
        return false; // Usuario no existe o contraseña incorrecta
        
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