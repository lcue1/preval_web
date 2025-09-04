<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Agregar</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body>

<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/preval_web/parcials/employerNab.php"; 


?>
<form id="quotation"  class="form m-5" action="" method="POST">
    <div class="card shadow mb-4">
        <div class="card-body p-4">
            <div class="text-center mb-4">
                <h3 class="mb-0">Cotización de Productos</h3>
                <p class="text-muted"><?= isset($quotationId)?'Editar':'Complete todos los campos requeridos'?></p>
            </div>
            
            <!-- Producto -->
            <div class="mb-3">
                <label for="product" class="form-label fw-bold">
                    <i class="fas fa-box me-2"></i>Producto:
                </label>
                <?php if(isset($quotationData)): ?>
                    <input type="hidden" name="quotationId" value="<?= $quotationData->quotationId ?>">
                <?php endif; ?>
                <select class="form-select" name="productId" id="product" required onchange="updateProductCost(this)">
                    <?php  if(!isset($quotationData)): ?>
                        <option value="" disabled selected>Seleccione un producto</option>                    <?php  else: ?>
                     <?php  endif ?>
                    <?php foreach ($products as $product): ?>
                        <option  value="<?= $product->productId ?>" data-cost="<?= $product->productCost ?>">
                            <?= htmlspecialchars($product->productName).' ('.$product->productCost.'$, '.$product->quantity.' Litros)' ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <input type="hidden" name="productCost" id="productCost" value=<?= $quotationData->productCost??'' ?>>

            <!-- Estructura -->
            <div class="mb-3">
                <label for="structure" class="form-label fw-bold">
                    <i class="fas fa-project-diagram me-2"></i>Estructura:
                </label>
                <textarea class="form-control" name="structureType" id="structure" rows="3"  
                          placeholder="Describa la estructura requerida"><?= $quotationData->structureType??'' ?></textarea>
            </div>
            
            <div class="row">
                <!-- Costo Estructura -->
                <div class="col-md-6 mb-3">
                    <label for="structureCost" class="form-label fw-bold">
                        <i class="fas fa-dollar-sign me-2"></i>Costo estructura:
                    </label>
                    <div class="input-group">
                        <span class="input-group-text">$</span>
                        <input type="number" class="form-control" name="structureCost" value=<?= $quotationData->structureCost??'' ?>
                               id="structureCost" placeholder="350.00" step="0.01" required>
                    </div>
                </div>
                
                <!-- Distancia -->
                <div class="col-md-6 mb-3">
                    <label for="distance" class="form-label fw-bold">
                        <i class="fas fa-route me-2"></i>Distancia:
                    </label>
                    <div class="input-group">
                        <input type="number" class="form-control" name="distance" value=<?= $quotationData->distance??'' ?>
                               id="distance" placeholder="400" required>
                        <span class="input-group-text">km</span>
                    </div>
                </div>
            </div>
            
            <!-- Costo Viaje -->
            <div class="mb-4">
                <label for="travelCost" class="form-label fw-bold">
                    <i class="fas fa-truck me-2"></i>Costo viaje:
                </label>
                <div class="input-group">
                    <span class="input-group-text">$</span>
                    <input type="number" class="form-control" name="distanceCost" value=<?= $quotationData->distanceCost??'' ?>
                           id="travelCost" placeholder="400" required>
                </div>
            </div>
            
            <!-- Botón de generar -->
            <button type="submit" class="btn btn-primary w-100 py-2" name="transaction" value="<?= isset($quotationData) ? 'edit' : 'add' ?>">
                <i class="fas fa-calculator me-2"></i>Generar
            </button>
        </div>
    </div>
</form>

<!-- Validación de Bootstrap -->
<script>
document.getElementById('quotation').addEventListener('submit', function(e) {
    if(!confirm('¿Estás seguro de que deseas calcular esta cotización?')) {
        e.preventDefault(); // Cancela el envío si el usuario no confirma
    }
});
function updateProductCost(select) {
    const selectedOption = select.options[select.selectedIndex];
    document.getElementById('productCost').value = selectedOption.dataset.cost;
    
}   
    console.log(document.getElementById('productCost'));

</script>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
