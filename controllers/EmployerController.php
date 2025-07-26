<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/preval_web/includes/conexion.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/preval_web/models/Employer.php";
class EmployerController{
    private $message =null;
    private $employers = null;
    public function processRequest(){
        require_once $_SERVER["DOCUMENT_ROOT"]."/preval_web/includes/auth.php"; 
        verifySession();


        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            try{
                $conexion = (new Conexion())->conectar();
                $employerModel = new Employer();
                $this->employers = $employerModel->getAllEmployers($conexion);
            }
            catch(Exception $e){
                $this->message = $e->getMessage();
            }finally{
                if(isset($conexion) && $conexion instanceof mysqli){
                    $conexion->close();
                }
            }
        }
    }
    public function getMessage(){
        return $this->message;
    }
    public function getEmployers(){
        return $this->employers;
    }
}

?>