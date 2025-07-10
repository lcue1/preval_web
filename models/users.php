    <?php

    require_once $_SERVER["DOCUMENT_ROOT"]."/preval_web/includes/auth.php"; 
    verifySession();

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $operation = $_POST["operation"] ?? "";
        $userName = $_POST["userName"] ?? "";
        $name = $_POST["name"] ?? "";
        $password = $_POST["password"] ?? ""; 

        
        if(!isset($operation) || empty($userName) || empty($name) || empty($password    )){
        
            header("Location: /preval_web/pages/system/users.php?message=Campos invalidos");
            exit();
        }
        
        require_once $_SERVER["DOCUMENT_ROOT"]."/preval_web/includes/conexion.php"; 
        $conexion = new Conexion();
        $conexion = $conexion->conectar();
       
        if($operation == "save"){
    $stmt = $conexion->prepare("INSERT INTO employer(userName, name, password) VALUES (?,?,?)");
    $stmt->bind_param("sss", $userName, $name, $password);
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
            $stmt = $conexion->prepare("UPDATE employer SET name = ?, password = ? WHERE userName = ?");
            $stmt->bind_param("sss", $name, $password, $userName);
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

        $stmt = $conn->prepare("SELECT * FROM employer");
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
    ?>