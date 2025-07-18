<?php
// Obtener y sanitizar los datos de entrada
$userName = trim($_POST['userName'] ?? '');
$password = trim($_POST['password'] ?? '');

// Validar campos vacíos
if (empty($userName) || empty($password)) {
    http_response_code(400); // Solicitud incorrecta
    exit('Usuario o contraseña inválidos');
}
require_once 'conexion.php';
$conexion = new Conexion();
$conn = $conexion->conectar();

$stmt = $conn->prepare("SELECT e.userName, e.name, er.rol_name FROM employer e 
JOIN employer_rol er ON e.rol_id = er.rol_id WHERE userName=? AND password=?");
if (!$stmt) {
    die("Error en prepare: " . $conn->error);
}

$stmt->bind_param("ss", $userName, $password);

if (!$stmt->execute()) {
    die("Error en execute: " . $stmt->error);
}

$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    // Usuario encontrado
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
        session_start();
        $usuario = $resultado->fetch_object();
      
        $_SESSION["userName"]=$usuario-> userName;
        $_SESSION["name"] = $usuario->name;
        $_SESSION["rol"] = $usuario->rol_name;
        header("Location: /preval_web/pages/system/index.php");
    
} else {
        header("Location: /preval_web/pages/login.php?message=Usuario o password incorrecto");
}

$stmt->close();
$conn->close();


?>