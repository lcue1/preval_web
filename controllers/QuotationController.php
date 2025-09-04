<?php
class QuotationController {
    private $quotations=null;
    function __construct() {
        require_once $_SERVER['DOCUMENT_ROOT'].'/preval_web/includes/auth.php';
        verifySession();
    }


    public function processRequest(){
        
        if($_SERVER['REQUEST_METHOD'] ==='GET'){
            $this->rederView();
        }else if($_SERVER['REQUEST_METHOD'] ==='POST'){
           $this->handlePostRequest();
            
        }
    }

    //shows an diferent view
    public function rederView(){
        $action = $_GET['action'] ?? 'list';
        switch ($action) {
            case 'add':
                $this->renderAdd();
                break;
            case 'edit':
                $this->renderEdit();
                break;
            default:
                $this->renderList();
                break;
        }
    }

    private function renderAdd() {
        require_once $_SERVER['DOCUMENT_ROOT'].'/preval_web/models/Product.php';
        require_once $_SERVER['DOCUMENT_ROOT'].'/preval_web/models/Quotation.php';
        require_once $_SERVER['DOCUMENT_ROOT'].'/preval_web/includes/conexion.php';

        $conexion = (new Conexion())->conectar();
        $productModel = new Product();
        $products = $productModel->getAllProducts($conexion);
        require_once $_SERVER['DOCUMENT_ROOT'].'/preval_web/views/system/quotationAdd.php';
    }

    private function renderEdit() {
        require_once $_SERVER['DOCUMENT_ROOT'].'/preval_web/models/Quotation.php';
        require_once $_SERVER['DOCUMENT_ROOT'].'/preval_web/models/Product.php';
        require_once $_SERVER['DOCUMENT_ROOT'].'/preval_web/includes/conexion.php';
        $quotationId = $_GET['quotationId'];
        $conexion = (new Conexion())->conectar();
        $quotation = new Quotation();
        $product = new Product();
        $quotationData = $quotation->getQuotationById($conexion,$quotationId);
        $products = $product->getAllProducts($conexion);
        require_once $_SERVER['DOCUMENT_ROOT'].'/preval_web/views/system/quotationAdd.php';
    }


    private function renderList() {
        require_once $_SERVER['DOCUMENT_ROOT'].'/preval_web/models/Quotation.php';
        require_once $_SERVER['DOCUMENT_ROOT'].'/preval_web/includes/conexion.php';
      try{
          $conexion = (new Conexion())->conectar();
            $quotationModel = new Quotation();
            $quotations = $quotationModel->getAllQuotations($conexion);
        require_once $_SERVER['DOCUMENT_ROOT'].'/preval_web/views/system/quotationList.php';
      }catch(Exception $e){
            FlashMessage::set('error', $e);
            header("Location: /preval_web/public/system/quotation.php");
      }
    }
    
    public function handlePostRequest(){
        
        require_once $_SERVER["DOCUMENT_ROOT"] . "/preval_web/utils/FlashMessage.php";
         $postData = [
                'productId' => $_POST['productId'],
                'productCost' => $_POST['productCost'],
                'structureType' => $_POST['structureType'],
                'structureCost' => $_POST['structureCost'],
                'distance' => $_POST['distance'],
                'distanceCost' => $_POST['distanceCost'],
                'transaction' => $_POST['transaction']
            ];
        if($_POST['transaction']=='add'){
            if(!$this->verifyInputs($postData)){
                FlashMessage::set('error', 'Todos los campos son requeritos.');
                header("Location: /preval_web/public/system/quotation.php");
                exit();
            }
            $this->createQuotation();
        }else  if($_POST['transaction']=='showEdit'){//shows add view with info
            header("Location: /preval_web/public/system/quotation.php?action=edit&quotationId=".$_POST['quotationId']);
            exit();
        }else if($_POST['transaction']=='edit'){
            $postData['quotationId'] = $_POST['quotationId'];
            if(!$this->verifyInputs($postData)){
                FlashMessage::set('error', 'Todos los campos son requeritos.');
                header("Location: /preval_web/public/system/quotation.php");
                exit();
            }
            $this->editQuotation();
        }
    }

    private function verifyInputs($postData){
            foreach ($postData as $key => $value) {
                if (empty($value)) {
                    return false;
                }
            }
                return true;
    }
    private function createQuotation(){
        require_once $_SERVER['DOCUMENT_ROOT'].'/preval_web/models/Quotation.php';
        require_once $_SERVER['DOCUMENT_ROOT'].'/preval_web/includes/conexion.php';
        
        $dataToCalculate=[//data to calculate total
            'productCost' => $_POST['productCost'],
            'structureCost' => $_POST['structureCost'],
            'distanceCost' => $_POST['distanceCost'],
        ];

        $quotatiionData =[//data to save
            'productId' => $_POST['productId'],
            'structureType' => $_POST['structureType'],
            'structureCost' => $_POST['structureCost'],
            'distance' => $_POST['distance'],
            'distanceCost' => $_POST['distanceCost'],
            'idEmployer' =>  $_SESSION["idEmployer"],
            'total' => $this->calculateTotal($dataToCalculate)
        ];
        
        try{
        $conexion = (new Conexion())->conectar();
        $quotation = new Quotation();
        if($quotation->addQuotation($conexion,$quotatiionData)){
            FlashMessage::set('success', 'Registro agregado.');
            header("Location: /preval_web/public/system/quotation.php");
            exit();
        }
        }catch(Exception $e){
            FlashMessage::set('error', $e);
            header("Location: /preval_web/public/system/quotation.php");
            exit();
        }finally{
            if(isset($conexion)){
                $conexion->close();
            }
        }
    }
    private function editQuotation(){
        require_once $_SERVER['DOCUMENT_ROOT'].'/preval_web/models/Quotation.php';
        require_once $_SERVER['DOCUMENT_ROOT'].'/preval_web/includes/conexion.php';
       
        $dataToCalculate=[//data to calculate total
            'productCost' => $_POST['productCost'],
            'structureCost' => $_POST['structureCost'],
            'distanceCost' => $_POST['distanceCost'],
        ];

        $quotatiionData =[//data to update
            'quotationId' => $_POST['quotationId'],
            'productId' => $_POST['productId'],
            'structureType' => $_POST['structureType'],
            'structureCost' => $_POST['structureCost'],
            'distance' => $_POST['distance'],
            'distanceCost' => $_POST['distanceCost'],
            'idEmployer' =>  $_SESSION["idEmployer"],
            'total' => $this->calculateTotal($dataToCalculate)
        ];
        
        try{
        $conexion = (new Conexion())->conectar();
        $quotation = new Quotation();
        if($quotation->editQuotation($conexion,$quotatiionData)){
            FlashMessage::set('success', 'Registro agregado.');
            header("Location: /preval_web/public/system/quotation.php");
            exit();
        }
        }catch(Exception $e){
            FlashMessage::set('error', $e);
            header("Location: /preval_web/public/system/quotation.php");
            exit();
        }finally{
            if(isset($conexion)){
                $conexion->close();
            }
        }
    }
    private function calculateTotal($quotationData){
        $total = 0.00;
        foreach($quotationData as $q){
            $total += $q;
        }
        return $total;
    }

}