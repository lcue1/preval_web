<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/preval_web/includes/conexion.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/preval_web/models/Employer.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/preval_web/utils/FlashMessage.php";

class EmployerController {
    private $employers = null;
    private $rols = null;
    function __construct(){
        
        require_once $_SERVER['DOCUMENT_ROOT'].'/preval_web/includes/auth.php';
        verifySession();
    }
    public function processRequest() {
        require_once $_SERVER["DOCUMENT_ROOT"]."/preval_web/includes/auth.php"; 
        verifySession();

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {//obtendremos los datos
            if (isset($_GET['idEmployer'])) {//actualiza el estado a I (inactivo)
                $conexion = (new Conexion())->conectar();
                $employerModel = new Employer();
                $delete = $employerModel->deleteEmployer($conexion, $_GET['idEmployer']);
                if ($delete !== true) {
                    FlashMessage::set('error', $delete); // Manejamos errores con FlashMessage
                    header("Location: /preval_web/public/system/employer.php");
                    exit();
                }
                FlashMessage::set('success', 'Usuario eliminado correctamente.');
                header("Location: /preval_web/public/system/employer.php");
                exit();
            }
            $this->processGetRequest();
            

        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {//procesa guardar o actualizar
            $this->processPostRequest();
        }
    }

    private function processGetRequest() {
        try {
            $conexion = (new Conexion())->conectar();
            $employerModel = new Employer();
            $this->employers = $employerModel->getAllEmployers($conexion);
            $this->rols = $employerModel->getAllRols($conexion);
        } catch (Exception $e) {
            FlashMessage::set('error', $e->getMessage()); // Usamos FlashMessage aquí también
        } finally {
            if (isset($conexion) && $conexion instanceof mysqli) {
                $conexion->close();
            }
        }
    }
    
    public function processPostRequest() {
        try {
            $userName = $_POST['userName'] ?? '';
            $name = $_POST['name'] ?? '';
            $rolId = $_POST['rolId'] ?? ''; // Corregí $rilId a $rolId
            $password = $_POST['password'] ?? '';
            $operation = $_POST['operation'] ?? '';
            $state = $_POST['state'] ?? '';
            
            if (empty($userName) || empty($name) || empty($rolId) || empty($operation) || empty($state)) {
                FlashMessage::set('error', 'Todos los campos son obligatorios.');
                header("Location: /preval_web/public/system/employer.php");
                exit();
            }

            $conexion = (new Conexion())->conectar();
            $employerModel = new Employer();
            if($operation === 'save'){
                  if (empty($password)) {
                    FlashMessage::set('error', 'La contraseña es obligatoria para nuevos usuarios');
                    header("Location: /preval_web/public/system/employer.php");
                    exit();
                }
            $save =$employerModel->saveEmployer($conexion, $userName, $name, $rolId, $password , $state);
            if ($save !== true) {
                FlashMessage::set('error', $save); // Manejamos errores con FlashMessage
                header("Location: /preval_web/public/system/employer.php");
                exit();
            }
                FlashMessage::set('success', 'Usuario agregado correctamente.');
                header("Location: /preval_web/public/system/employer.php");
                exit();
            }else if($operation === 'update'){
                
                $employerId = $_POST['employerId'] ?? '';
            
                if (empty($employerId)) {
                    FlashMessage::set('error', 'El ID del usuario es obligatorio para actualizar.');
                    header("Location: /preval_web/public/system/employer.php");
                    exit();
                }
                $update = $employerModel->updateEmployer($conexion, $employerId, $userName, $name, $rolId, $password, $state);
                if ($update !== true) {
                    FlashMessage::set('error', $update); 
                    header("Location: /preval_web/public/system/employer.php");
                    exit();
                }
               FlashMessage::set('success', 'Usuario actualizado correctamente.'); 
                header("Location: /preval_web/public/system/employer.php");
                exit();
            }

          
        } catch (Exception $e) {
            FlashMessage::set('error', $e->getMessage()); // Manejamos errores con FlashMessage
            header("Location: /preval_web/public/system/employer.php");
            exit();
        }finally {
            if (isset($conexion) && $conexion instanceof mysqli) {
                $conexion->close();
            }
        }
    }

    // Getters (ya no necesitamos getMessage())
    public function getEmployers() {
        return $this->employers;
    }

    public function getRols() {
        return $this->rols;
    }
}