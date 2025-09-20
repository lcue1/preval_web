<?php
class QuotationController
{
    private $quotations = null;
    function __construct()
    {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/preval_web/includes/auth.php';
        verifySession();
    }


    public function processRequest()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $this->rederView();
        } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->handlePostRequest();
        }
    }

    //shows an diferent view
    public function rederView()
    {
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

    private function renderAdd()
    {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/preval_web/models/Product.php';
        require_once $_SERVER['DOCUMENT_ROOT'] . '/preval_web/models/Quotation.php';
        require_once $_SERVER['DOCUMENT_ROOT'] . '/preval_web/includes/conexion.php';

        $conexion = (new Conexion())->conectar();
        $productModel = new Product();
        $products = $productModel->getAllProducts($conexion);
        require_once $_SERVER['DOCUMENT_ROOT'] . '/preval_web/views/system/quotationAdd.php';
    }

    private function renderEdit()
    {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/preval_web/models/Quotation.php';
        require_once $_SERVER['DOCUMENT_ROOT'] . '/preval_web/models/Product.php';
        require_once $_SERVER['DOCUMENT_ROOT'] . '/preval_web/includes/conexion.php';
        $quotationId = $_GET['quotationId'];
        $conexion = (new Conexion())->conectar();
        $quotation = new Quotation();
        $product = new Product();
        $quotationData = $quotation->getQuotationById($conexion, $quotationId);
        $products = $product->getAllProducts($conexion);
        require_once $_SERVER['DOCUMENT_ROOT'] . '/preval_web/views/system/quotationAdd.php';
    }


    private function renderList()
    {

        require_once $_SERVER['DOCUMENT_ROOT'] . '/preval_web/models/Quotation.php';
        require_once $_SERVER['DOCUMENT_ROOT'] . '/preval_web/includes/conexion.php';
        try {
            $conexion = (new Conexion())->conectar();
            $quotationModel = new Quotation();
            $quotations = $quotationModel->getAllQuotations($conexion);
            require_once $_SERVER['DOCUMENT_ROOT'] . '/preval_web/views/system/quotationList.php';

            if (isset($_GET['download'])): ?>
                <script>
                    const link = document.createElement('a');
                    link.href = '/preval_web/temp/<?php echo $_GET['download']; ?>';
                    link.download = '<?php echo $_GET['download']; ?>';
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);
                </script>
<?php endif;
        } catch (Exception $e) {
            FlashMessage::set('error', $e);
            header("Location: /preval_web/public/system/quotation.php");
        }
    }

    public function handlePostRequest()
    {

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
        if ($_POST['transaction'] == 'add') {
            if (!$this->verifyInputs($postData)) {
                FlashMessage::set('error', 'Todos los campos son requeritos.');
                header("Location: /preval_web/public/system/quotation.php");
                exit();
            }
            $this->createQuotation();
        } else  if ($_POST['transaction'] == 'showEdit') { //shows add view with info
            header("Location: /preval_web/public/system/quotation.php?action=edit&quotationId=" . $_POST['quotationId']);
            exit();
        } else if ($_POST['transaction'] == 'edit') { //does the edit action
            $postData['quotationId'] = $_POST['quotationId'];
            if (!$this->verifyInputs($postData)) {
                FlashMessage::set('error', 'Todos los campos son requeritos.');
                header("Location: /preval_web/public/system/quotation.php");
                exit();
            }
            $this->editQuotation();
        }
    }

    private function verifyInputs($postData)
    {
        foreach ($postData as $key => $value) {
            if (empty($value)) {
                return false;
            }
        }
        return true;
    }
    private function createQuotation()
    {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/preval_web/models/Quotation.php';
        require_once $_SERVER['DOCUMENT_ROOT'] . '/preval_web/models/Product.php';
        require_once $_SERVER['DOCUMENT_ROOT'] . '/preval_web/includes/conexion.php';

        $dataToCalculate = [ //data to calculate total
            'productCost' => $_POST['productCost'],
            'structureCost' => $_POST['structureCost'],
            'distanceCost' => $_POST['distanceCost'],
        ];

        $quotatiionData = [ //data to save
            'productId' => $_POST['productId'],
            'structureType' => $_POST['structureType'],
            'structureCost' => $_POST['structureCost'],
            'distance' => $_POST['distance'],
            'distanceCost' => $_POST['distanceCost'],
            'idEmployer' =>  $_SESSION["idEmployer"],
            'total' => $this->calculateTotal($dataToCalculate)
        ];

        try {
            $conexion = (new Conexion())->conectar();
            $quotation = new Quotation();
            $product = new Product();
            $productData = $product->getProducctById($conexion, $quotatiionData['productId']);
            $pdfData = array_merge((array)$productData, $quotatiionData);

            if ($quotation->addQuotation($conexion, $quotatiionData)) {
                FlashMessage::set('success', 'Cotizacion guardada exitosamente!');
                $this->generateFilePDF($pdfData);
                //  header("Location: /preval_web/public/system/quotation.php");
                exit();
            }
        } catch (Exception $e) {
            FlashMessage::set('error', $e);
            header("Location: /preval_web/public/system/quotation.php");
            exit();
        } finally {
            if (isset($conexion)) {
                $conexion->close();
            }
        }
    }
    private function editQuotation()
    {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/preval_web/models/Quotation.php';
        require_once $_SERVER['DOCUMENT_ROOT'] . '/preval_web/includes/conexion.php';

        $dataToCalculate = [ //data to calculate total
            'productCost' => $_POST['productCost'],
            'structureCost' => $_POST['structureCost'],
            'distanceCost' => $_POST['distanceCost'],
        ];

        $quotatiionData = [ //data to update
            'quotationId' => $_POST['quotationId'],
            'productId' => $_POST['productId'],
            'structureType' => $_POST['structureType'],
            'structureCost' => $_POST['structureCost'],
            'distance' => $_POST['distance'],
            'distanceCost' => $_POST['distanceCost'],
            'idEmployer' =>  $_SESSION["idEmployer"],
            'total' => $this->calculateTotal($dataToCalculate)
        ];

        try {
            $conexion = (new Conexion())->conectar();
            $quotation = new Quotation();
            if ($quotation->editQuotation($conexion, $quotatiionData)) {
                FlashMessage::set('success', 'Registro agregado.');
                header("Location: /preval_web/public/system/quotation.php");
                exit();
            }
        } catch (Exception $e) {
            FlashMessage::set('error', $e);
            header("Location: /preval_web/public/system/quotation.php");
            exit();
        } finally {
            if (isset($conexion)) {
                $conexion->close();
            }
        }
    }
    private function calculateTotal($quotationData)
    {
        $total = 0.00;
        foreach ($quotationData as $q) {
            $total += $q;
        }
        return $total;
    }



    private function generateFilePDF($pdfData)
    {

        require_once $_SERVER['DOCUMENT_ROOT'] . '/preval_web/libs/fpdf186/fpdf.php';

        $pdf = new FPDF();
        $pdf->AddPage();

        // Logo
        $pdf->Image($_SERVER['DOCUMENT_ROOT'] . '/preval_web/img/logo_l.jpg', 10, 8, 70);

        // Mover el cursor para dejar espacio debajo del logo
        $pdf->Ln(25);

        // Título principal
        $pdf->SetFont('Arial', 'B', 16);

        // Encabezado
        $pdf->Cell(0, 10, 'Cotizacion', 0, 1, 'C');

        $pdf->Ln(10);

        // Texto introductorio
        $pdf->SetFont('Arial', '', 12);
        $intro = "En Preval nos complace enormemente establecer contacto con usted y tener la oportunidad de presentarle la presente cotización. Nuestro objetivo es brindarle toda la información necesaria de manera clara y detallada, asegurando que cada aspecto de nuestros productos y servicios sea comprendido.

A continuación, se presentan los valores correspondientes a los elementos cotizados, con la finalidad de facilitar su revisión y toma de decisiones. Estamos a su disposición para cualquier aclaración o información adicional que considere necesaria.";
        $pdf->MultiCell(0, 8, $intro);
        $pdf->Ln(8);

        // Detalles del array
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(60, 10, 'Concepto', 1, 0, 'C');
        $pdf->Cell(60, 10, 'Valor', 1, 1, 'C');

        $pdf->SetFont('Arial', '', 12);

        // Descripción del producto
        $pdf->Cell(60, 10, 'Descripcion del producto', 1);
        $pdf->Cell(60, 10, $pdfData['productName'], 1, 1);

        // Cantidad
        $pdf->Cell(60, 10, 'Cantidad (litros)', 1);
        $pdf->Cell(60, 10, number_format($pdfData['quantity'], 2), 1, 1);

        // Material
        $pdf->Cell(60, 10, 'Material tanque', 1);
        $pdf->Cell(60, 10, $pdfData['material'], 1, 1);

        // Costo producto
        $pdf->Cell(60, 10, 'Costo producto', 1);
        $pdf->Cell(60, 10, "$" . number_format($pdfData['productCost'], 2), 1, 1);

        // Tipo de estructura
        $pdf->Cell(60, 10, 'Tipo de estructura', 1);
        $pdf->Cell(60, 10, $pdfData['structureType'], 1, 1);

        // Costo estructura
        $pdf->Cell(60, 10, 'Costo estructura', 1);
        $pdf->Cell(60, 10, $pdfData['structureCost'], 1, 1);

        // Distancia
        $pdf->Cell(60, 10, 'Distancia viaje', 1);
        $pdf->Cell(60, 10, $pdfData['distance'], 1, 1);

        // Costo distancia
        $pdf->Cell(60, 10, 'Costo distancia', 1);
        $pdf->Cell(60, 10, $pdfData['distanceCost'], 1, 1);

        // Total
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(60, 10, 'TOTAL', 1);
        $pdf->Cell(60, 10, "$" . number_format($pdfData['total'], 2), 1, 1);
        $pdf->Ln(15);

        // Mensaje de cierre
        $pdf->SetFont('Arial', '', 12);
        $cierre = "Ha sido un placer atenderle. Quedamos atentos a sus comentarios.\n\n"
            . "Saludos cordiales,\n"
            . "Ing. Luis Valverde.";
        $pdf->MultiCell(0, 8, $cierre);


        // Mostrar PDF en navegador
        $filename = 'cotizacion_preval.pdf';
        $ruta = $_SERVER['DOCUMENT_ROOT'] . '/preval_web/temp/' . $filename;
        $pdf->Output('F', $ruta);

        // Redirigir con GET para que la página dispare la descarga con JS
        header("Location: /preval_web/public/system/quotation.php?download=" . $filename);
        exit();
    }
}
