
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preval</title>
        <!-- Bustrap -->
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Fuentes -->
     <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
     <!-- font icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

      <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Display&display=swap" rel="stylesheet">
    
        <link rel="stylesheet" href="/preval_web/css/reset.css">
        <link rel="stylesheet" href="/preval_web/css/body.css">
    <link rel="icon" type="image/png" href="/preval_web/img/logo_s.jpg"> 




    
</head>
<body>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/preval_web/parcials/header.php"; ?>

  
   </div>
   <section class="container my-5">
  <h2 class="text-center mb-4 subtitle" >Contáctanos</h2>
  <p class="text-center mb-5 descripcion">
    Si deseas más información sobre nuestros servicios o productos, por favor completa el siguiente formulario y nos pondremos en contacto contigo lo antes posible.
  </p>

<section class="container my-5">
  
  <?php
  if(!empty($message)): ?>
    <div class="alert alert-info" role="alert" id="alertMessage">
      <?php echo htmlspecialchars($message); ?>
  </div> 
  <?php endif; ?>


  <!-- Resto de tu formulario... -->
</section>

  <div class="row g-4">
 
    <!-- Formulario -->
    <div class="col-md-6">
      <form action="" method="POST">
        <div class="mb-3">
          <label for="name" class="form-label">Nombre completo</label>
          <input name="name" type="text" class="form-control" id="nombre" placeholder="Ej. Javier Lopez" >
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Correo electrónico</label>
          <input name="email" type="email" class="form-control" id="correo" placeholder="correo@ejemplo.com" required>
        </div>
        <div class="mb-3">
          <label for="phone" class="form-label">Teléfono</label>
          <input name="phone" type="tel" class="form-control" id="telefono" placeholder="+593 0991234567" required>
        </div>
        <div class="mb-3">
          <label for="coment" class="form-label">Describe tu requerimiento</label>
          <textarea name="coment" class="form-control" id="mensaje" rows="5" placeholder="Escribe tu mensaje aquí..." required></textarea>
        </div>  
        <button type="submit" class="btn btn-primary w-100">Enviar mensaje</button>
      </form>
    </div>
    <!-- Información de contacto + descarga -->
    <div class="col-md-6">
      <div class="bg-light p-4 rounded shadow-sm h-100 d-flex flex-column justify-content-between">
        <div>
          <h5 class="mb-3 text-primary"><i class="fas fa-map-marker-alt me-2"></i> Dirección</h5>
          <p>San Antonio de Pichincha sector, Quito, Ecuador</p>

          <h5 class="mb-3 text-primary"><i class="fas fa-envelope me-2"></i> Correo</h5>
          <p>contacto@preval.ec</p>

          <h5 class="mb-3 text-primary"><i class="fas fa-phone me-2"></i> Teléfono</h5>
          <p>+593 0991237979</p>
        </div>

        <!-- Botón de descarga -->
        <div class="mt-4">
          <a href="../Documento_tecnico.pdf" class="btn btn-outline-primary w-100" download>
            <i class="fas fa-file-pdf me-2"></i> Descargar Documento tecnico PDF
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/preval_web/parcials/footer.php"; ?>

<script src="/preval_web/js/main.js"></script>

<script src="/preval_web/public/js/removeMessage.js"></script>
<script>

  const alertMsg = document.getElementById('alertMessage');
  if (alertMsg) {
    removeMessage(alertMsg,5000); // 3 segundos
  }
</script>
</body>
</html>