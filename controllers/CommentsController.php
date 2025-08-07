<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/preval_web/includes/conexion.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/preval_web/utils/FlashMessage.php";
class CommentsController {
    private $comments = null;
    public function __construct() {
        require_once $_SERVER["DOCUMENT_ROOT"] . "/preval_web/includes/auth.php";
        verifySession();
    }

    public function processRequest() {
        if($_SERVER['REQUEST_METHOD'] === 'GET') {
            $this->processGetRequest();
        }elseif($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->processPostRequest();
        }
    }
    private function processGetRequest() {
        try {
            require_once $_SERVER["DOCUMENT_ROOT"] . "/preval_web/includes/conexion.php";
            require_once $_SERVER["DOCUMENT_ROOT"] . "/preval_web/models/Comments.php";
            $conexion = (new Conexion())->conectar();
            $c = new Comments();
            $this->comments = $c->getAllComments($conexion);
        }catch (Exception $e) {
            FlashMessage::set('error', $e->getMessage());
        }finally {
            if (isset($conexion) && $conexion instanceof mysqli) {
                $conexion->close();
            }
    }
    }
    public function getComments() {
        return $this->comments;
    }
        private function processPostRequest() {
            
            $dataComment =[
                'idComment' => $_POST['idComment'] ?? '',
                'resolutionDetails' => $_POST['resolutionDetails'] ?? '',
            ];
            foreach ($dataComment as $key => $value) {
                if (empty($value)) {
                    FlashMessage::set('error', 'Por favor, complete todos los campos obligatorios.');
                    return;
                }
            }
            try {
                require_once $_SERVER["DOCUMENT_ROOT"] . "/preval_web/includes/conexion.php";
                require_once $_SERVER["DOCUMENT_ROOT"] . "/preval_web/models/Comments.php";
                $conexion = (new Conexion())->conectar();
                $comments = new Comments();
                if($comments->resolveResolution($conexion, $dataComment)) {
                    FlashMessage::set('success', 'Comentario actualizado correctamente.');
                    $this->processGetRequest(); // Refrescar los comentarios después de la actualización
                    return;
                }
            } catch (Exception $e) {
                FlashMessage::set('error', $e->getMessage());

            }finally {
                if (isset($conexion) && $conexion instanceof mysqli) {
                    $conexion->close();
                }
            }
        }
    }

?>