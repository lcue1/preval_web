<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Productos</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  <style>
    :root {
      --primaryColor: #0e1b2e;
      --secundaryColor: #50acdd;
      --textColor: #fff;
      --fontFamily: 'Poppins', sans-serif;
    }
    
    body {
      font-family: var(--fontFamily);
    }
    
    .btn-custom-primary {
      background-color: var(--primaryColor);
      color: var(--textColor);
      border: none;
      transition: all 0.3s ease;
    }
    
    .btn-custom-primary:hover {
      background-color: var(--secundaryColor);
      transform: translateY(-2px);
    }
    
    .btn-custom-secondary {
      background-color: var(--secundaryColor);
      color: var(--textColor);
      border: none;
    }
    
    .btn-custom-secondary:hover {
      background-color: #3d8cb5;
      color: var(--textColor);
    }
    
    .table-custom thead {
      background-color: var(--primaryColor);
      color: var(--textColor);
    }
    
    .table-custom tbody tr:hover {
      background-color: rgba(80, 172, 221, 0.1);
    }
    
    .form-container {
      background-color: #f8f9fa;
      padding: 2rem;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(14, 27, 46, 0.1);
    }
    
    .btn-container {
      display: flex;
      gap: 1rem;
      margin-bottom: 2rem;
    }
    
    h3 {
      color: var(--primaryColor);
      margin-bottom: 1.5rem;
      font-weight: 600;
    }
    
    .form-label {
      font-weight: 500;
      color: var(--primaryColor);
    }
    
    .alert-custom {
      background-color: var(--secundaryColor);
      color: var(--textColor);
      border: none;
    }
    
    .bi-pencil-square {
      color: var(--primaryColor);
    }
    .title{
      color: var(--secundaryColor);
      border-bottom: 1px solid var(--primaryColor);
    }
    
    @media (max-width: 768px) {
      .btn-container {
        flex-direction: column;
      }
    }
  </style>
</head>
<body>

<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/preval_web/parcials/employerNab.php"; 
require_once $_SERVER["DOCUMENT_ROOT"]."/preval_web/utils/flashMessage.php";

?>
<main class="col-sm-12 col-md-9 col-lg-10 px-4 py-3">
  <h3 class="title">Gestión de Productos</h3>
  <?php 
  $error = FlashMessage::get('error');
  $success = FlashMessage::get('success');

  if ($error): ?>
      <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
  <?php endif; 

  if ($success): ?>
      <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
  <?php endif;
  ?>
  
  <!-- Botones de control -->
  <div class="btn-container">
    <button class="btn btn-custom-primary" type="button" data-bs-toggle="collapse" data-bs-target="#productTableCollapse" aria-expanded="true" aria-controls="productTableCollapse">
      <i class="bi bi-box-seam me-2"></i>Productos
    </button>
    <button class="btn btn-custom-primary" type="button" data-bs-toggle="collapse" data-bs-target="#productFormCollapse" aria-expanded="false" aria-controls="productFormCollapse">
      <i class="bi bi-plus-circle me-2"></i>Agregar producto
    </button>
  </div>

  <!-- Contenedor colapsable del FORMULARIO -->
  <div class="collapse mb-4 form-container" id="productFormCollapse">
    <form action="" method="post">
      <h3 id="formTitle"><i class="bi bi-plus-circle me-2"></i>Agregar producto</h3>
      <input type="hidden" name="productId" id="productId" value="">
      
      <div class="mb-3">
        <label for="productName" class="form-label">Nombre del Producto</label>
        <input type="text" class="form-control" id="productName" name="productName" placeholder="Ingrese el nombre del producto" >
      </div>

      <div class="mb-3">
        <label for="quantity" class="form-label">Cantidad</label>
        <input type="number" step="0.01" class="form-control" id="quantity" name="quantity" placeholder="Ingrese la cantidad" required>
      </div>

      <div class="mb-3">
        <label for="material" class="form-label">Material</label>
        <input type="text" class="form-control" id="material" name="material" placeholder="Ingrese el material" required>
      </div>

      <div class="d-flex gap-2">
        <button id="btnSubmit" type="submit" name="operation" class="btn btn-custom-primary" value="save">
          <i class="bi bi-save me-2"></i>Guardar
        </button>
        <a id="cancelBtn" href="/preval_web/public/system/products.php" class="btn btn-custom-secondary" hidden>
          <i class="bi bi-x-circle me-2"></i>Cancelar
        </a>
      </div>
    </form>

    <?php if(isset($_GET["message"])): ?>
      <div class="alert alert-custom mt-3" id="messageFromServer">
        <i class="bi bi-info-circle me-2"></i><?= htmlspecialchars($_GET["message"]) ?>
      </div>
    <?php endif; ?>
  </div>

  <!-- Contenedor colapsable de la TABLA -->
  <div class="collapse show" id="productTableCollapse">
    <div class="table-responsive">
      <table class="table table-custom table-hover">
        <thead>
          <tr>
            <th><i class="bi bi-box me-2"></i>ID</th>
            <th><i class="bi bi-card-text me-2"></i>Nombre</th>
            <th><i class="bi bi-123 me-2"></i>Cantidad</th>
            <th><i class="bi bi-gear me-2"></i>Material</th>
            <th><i class="bi bi-pencil me-2"></i>Editar</th>
            <th><i class="bi bi-trash me-2"></i>Eliminar</th>
          </tr>
        </thead>
        <tbody>
          <?php if(empty($products)): ?> 
            <tr>
              <td colspan="6" class="text-center">No hay productos registrados</td>
            </tr>
          <?php else: ?>
            <?php foreach($products as $product): ?>
              <tr>
                <td><?= $product->productId ?></td>
                <td><?= htmlspecialchars($product->productName) ?></td>
                <td><?= number_format($product->quantity, 2) ?></td>
                <td><?= htmlspecialchars($product->material) ?></td>
                <td>
                  <a href="#" class="btn btn-sm btn-outline-primary"
                    onclick="editProduct(
                      '<?= $product->productId ?>',
                      '<?= htmlspecialchars($product->productName, ENT_QUOTES) ?>',
                      '<?= $product->quantity ?>',
                      '<?= htmlspecialchars($product->material, ENT_QUOTES) ?>')">
                    <i class="bi bi-pencil-square"></i>
                  </a>
                </td>
                <td>
                  <a href="#" class="btn btn-sm btn-outline-danger" 
                    onclick="deleteProduct(event, '<?= $product->productId ?>')">
                    <i class="bi bi-trash"></i>
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    

  function editProduct(productId, productName, quantity, material, event) {
    if(event) event.preventDefault();
    
    document.getElementById('productId').value = productId;
    document.getElementById('formTitle').innerHTML = '<i class="bi bi-pencil-square me-2"></i>Editar producto';
    
    document.getElementById('productName').value = productName;
    document.getElementById('quantity').value = quantity;
    document.getElementById('material').value = material;
    
    const btnSubmit = document.getElementById('btnSubmit');
    btnSubmit.innerHTML = '<i class="bi bi-arrow-repeat me-2"></i>Actualizar';
    btnSubmit.value = "update";
    document.getElementById('cancelBtn').hidden = false;
    
    new bootstrap.Collapse(document.getElementById('productFormCollapse'), { toggle: true });
    
    if(document.getElementById("messageFromServer")) {
      document.getElementById("messageFromServer").remove();
    }
  }

  function deleteProduct(event, productId) {
    if (confirm('¿Estás seguro de eliminar este producto?')) {
      window.location.href = `/preval_web/public/system/product.php?productId=${productId}`;
    }
  }
</script>

</body>
</html>