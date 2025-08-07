<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/preval_web/includes/conexion.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/preval_web/models/Contacto.php";

class ContactoController
{
    private $message=null;
    public function procesarFormulario()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            try {
             $dataComment = [
                'name' => $_POST["name"] ?? '',
                'email' => $_POST["email"] ?? '',
                'phone' => $_POST["phone"] ?? '',
                'coment' => $_POST["coment"] ?? ''
            ];
            if (!$this->validateData($dataComment)) {
                $this->message = "Todos los campos son obligatorios.";
                return;
            }


                $conexion = (new Conexion())->conectar();
                $contactoModel = new Contacto();
                
                if($contactoModel->saveComment($conexion, $dataComment)){
                    $this->message = "Hemos recibido tu mensaje pronto nos contactaremos con tigo.";
                }

                
            } catch (Exception $e) {
                $this->message = $e->getMessage();
            }
        }
    }
    public function getMessage(){
        return $this->message;
    }

    private function validateData($data){
        $correct = true;
        foreach ($data as $value) {
            if (empty($value)) {
                $correct = false;
                break;                
            }
        }
        return $correct;
    }
}