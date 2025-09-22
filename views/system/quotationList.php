<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cotizaciones</title>

    <style>
      
    .title{
      color: var(--secundaryColor);
      border-bottom: 1px solid var(--primaryColor);
      margin: 3rem 1rem;
    }
    </style>
  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <link rel="icon" type="image/png" href="/preval_web/img/logo_s.jpg"> 
</head>
<body>

<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/preval_web/includes/auth.php"; 
verifySession();
require_once $_SERVER["DOCUMENT_ROOT"]."/preval_web/parcials/employerNab.php"; 
require_once $_SERVER["DOCUMENT_ROOT"]."/preval_web/utils/flashMessage.php";

?><!-- Contenido principal -->
<main class="container-fluid px-3 pt-4">
   <?php 
  $error = FlashMessage::get('error');
  $success = FlashMessage::get('success');

  if ($error): ?>
      <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
  <?php endif; 

  if ($success): ?>
      <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
  <?php endif;
  
  if(empty($quotations)): ?>
    <div class="alert alert-secondary" role="alert">
      No hay cotizaciones.
    </div>
  <?php else: ?>
    
    <h3 class="title mb-4">Gestión de cotizaciones</h3>

    <div class="row row-cols-1 row-cols-md-2 g-3">
      <?php foreach($quotations as $index => $q): ?>
        <div class="col mb-3">
          <!-- Formulario para cada card -->
          <form method="post" action="" class="h-100">
            <input type="hidden" name="quotationId" value="<?= $q->quotationId ?>">
            
            <div class="card h-100 shadow-sm border-0">
              <div class="card-header bg-primary text-white">
                <div class="d-flex justify-content-between align-items-center">
                  <h5 class="card-title mb-0 fs-6"><?= $q->productName ?></h5>
                  <span class="badge bg-light text-dark">#<?= $index+1 ?></span>
                </div>
              </div>
              <div class="card-body">
                <div class="mb-3">
                  <h6 class="text-muted small mb-1">Estructura</h6>
                  <span class="badge bg-info text-dark"><?= $q->structureType ?></span>
                </div>
                
                <div class="row g-2">
                  <div class="col-6">
                    <h6 class="text-muted small mb-1">Costo Est.</h6>
                    <p class="mb-0 small">$<?= number_format($q->structureCost, 2) ?></p>
                  </div>
                  <div class="col-6">
                    <h6 class="text-muted small mb-1">Distancia</h6>
                    <p class="mb-0 small"><?= $q->distance ?> km</p>
                  </div>
                  <div class="col-6">
                    <h6 class="text-muted small mb-1">Costo Dist.</h6>
                    <p class="mb-0 small">$<?= number_format($q->distanceCost, 2) ?></p>
                  </div>
                  <div class="col-6">
                    <h6 class="text-muted small mb-1">Empleado</h6>
                    <span class="badge bg-light text-dark small"><?= $q->name ?></span>
                  </div>
                </div>
              </div>
              <div class="card-footer bg-light">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <h6 class="text-muted small mb-0">Total</h6>
                    <h5 class="mb-0 text-success fw-bold fs-6">$<?= number_format($q->total, 2) ?></h5>
                  </div>
                  <div>
                    <button type="submit" name="transaction" value="showEdit" 
                            class="btn btn-sm btn-warning me-1" title="Editar">
                      <i class="bi bi-pencil-square"></i> 
                    </button>
                    <button type="submit" name="transaction" value="delete" 
                            class="btn btn-sm btn-danger" 
                            onclick="return confirm('¿Estás seguro de eliminar esta cotización?')" 
                            title="Eliminar">
                      <i class="bi bi-trash"></i> 
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      <?php endforeach; ?>
    </div>

  <?php endif; ?>
</main>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
