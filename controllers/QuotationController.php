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
            case 'list':
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



    private function renderList() {
        require_once $_SERVER['DOCUMENT_ROOT'].'/preval_web/models/Quotation.php';
        require_once $_SERVER['DOCUMENT_ROOT'].'/preval_web/includes/conexion.php';
        $conexion = (new Conexion())->conectar();
        $quotationModel = new Quotation();
        header("Location: /preval_web/views/system/quotationList.php");

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
        if(!$this->verifyInputs($postData)){
            FlashMessage::set('error', 'Todos los campos son requeritos.');
            header("Location: /preval_web/public/system/quotation.php");
        }
        if($_POST['transaction']=='add'){
            $this->createQuotation();
        }else  if($_POST['transaction']=='edit'){
            FlashMessage::set('success', 'Registro editado.');
            header("Location: /preval_web/public/system/quotation.php");
            //pendiente
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
    private function calculateTotal($quotationData){
        $total = 0.00;
        foreach($quotationData as $q){
            $total += $q;
        }
        return $total;
    }

}