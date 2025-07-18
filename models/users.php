    <?php

    require_once $_SERVER["DOCUMENT_ROOT"]."/preval_web/includes/auth.php"; 
    verifySession();

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $operation = $_POST["operation"] ?? "";
        $userName = $_POST["userName"] ?? "";
        $name = $_POST["name"] ?? "";
        $rolId = $_POST["rolId"] ?? ""; 
        $password = $_POST["password"] ?? ""; 

        /* debug
        var_dump($operation);
        var_dump($userName);
        var_dump($name);
        var_dump($rolId);
        var_dump($password);
        exit();
        */
        
        
        if(!isset($operation) || empty($userName) || empty($name) ||empty($rolId) ||empty($password    )){
        
            header("Location: /preval_web/pages/system/users.php?message=Campos invalidos");
            exit();
        }
        
        require_once $_SERVER["DOCUMENT_ROOT"]."/preval_web/includes/conexion.php"; 
        $conexion = new Conexion();
        $conexion = $conexion->conectar();
       
    if($operation == "save"){
        $stmt = $conexion->prepare("INSERT INTO employer(userName, name,password, rol_id) VALUES (?,?,?,?)");
        $stmt->bind_param("sssi", $userName, $name, $password,$rolId);
        if($stmt->execute()){
            header("Location: /preval_web/pages/system/users.php?message=Usuario agregado");
        } else {
            // Verificar si el error es por duplicado de clave primaria
            if($stmt->errno == 1062) { 
                header("Location: /preval_web/pages/system/users.php?message=El nombre de usuario ya existe");
            } else {
                header("Location: /preval_web/pages/system/users.php?message=Error al guardar el usuario");
            }
        }
        exit();
}

        if($operation == "update"){
            $stmt = $conexion->prepare("UPDATE employer SET name = ?, password = ?, rol_id = ? WHERE userName = ?");
            $stmt->bind_param("ssis", $name, $password,$rolId, $userName);
            if($stmt->execute()){  
                header("Location: /preval_web/pages/system/users.php?message=Usuario actualizado"); 
            } else {
                header("Location: /preval_web/pages/system/users.php?message=".$stmt->error);
            }
        }
    }else if($_SERVER['REQUEST_METHOD'] == "GET" &&  isset($_GET["userName"])){
        require_once $_SERVER["DOCUMENT_ROOT"]."/preval_web/includes/conexion.php"; 
        $conexion = new Conexion();
        $conexion = $conexion->conectar();
        
        $stmt = $conexion->prepare("DELETE FROM employer WHERE userName = ?");
        $stmt->bind_param("s", $_GET["userName"]);
        if($stmt->execute()){  
                header("Location: /preval_web/pages/system/users.php?message=Usuario eliminado"); 
            } else {
                header("Location: /preval_web/pages/system/users.php?message=".$stmt->error);
            }
    }

    // Funciones
    function getAllUsers() {
        require_once $_SERVER['DOCUMENT_ROOT'].'/preval_web/includes/conexion.php';
        $conexion = new Conexion();
        $conn = $conexion->conectar();

        $stmt = $conn->prepare("SELECT e.userName, e.name, e.password, er.rol_name, e.rol_id FROM employer e
        JOIN employer_rol er WHERE e.rol_id = er.rol_id");
        if (!$stmt) {
            $conn->close();
            return null;
        }

        if (!$stmt->execute()) {
            $stmt->close();
            $conn->close();
            return null;
        }

        $result = $stmt->get_result();
        
        if ($result->num_rows === 0) {
            $stmt->close();
            $conn->close();
            return null;
        }

        $users = [];
        
        while ($user = $result->fetch_object()) {
            $users[] = $user;
        }
        
        $stmt->close();
        $conn->close();
        
        return $users;
    }

function get_rols() {
    require_once $_SERVER['DOCUMENT_ROOT'].'/preval_web/includes/conexion.php';
    $conexion = new Conexion();
    $conn = $conexion->conectar();

    // Preparar la consulta
    $stmt = $conn->prepare("SELECT * FROM employer_rol");
    if (!$stmt) {
        $error = $conn->error; // Capturar el error de MySQL
        $conn->close();
        
        return [
            "status" => false,
            "error" => "Error: " . $error
        ];
    }

    // Ejecutar la consulta
    if (!$stmt->execute()) {
        $error = $stmt->error; // Capturar el error de ejecución
        $stmt->close();
        $conn->close();

        return [
            "status" => false,
            "error" => "Error: " . $error
        ];
    }

    // Obtener resultados
    $result = $stmt->get_result();
    
    // Si no hay resultados, devolver array vacío
    if ($result->num_rows === 0) {
        $stmt->close();
        $conn->close();
        
        return [
            "status" => true,
            "users" => [[]] // Array vacío dentro de otro array como solicitaste
        ];
    }

    // Recoger los usuarios
    $users = [];
    while ($user = $result->fetch_object()) {
        $users[] = $user;
    }
    
    $stmt->close();
    $conn->close();
    
    return [
        "status" => true,
        "users" => $users
    ];
}
    ?>