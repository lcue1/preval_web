
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
    
        <link rel="stylesheet" href="../css/reset.css">
        <link rel="stylesheet" href="../css/styles.css">
        <link rel="stylesheet" href="../css/productos.css">
        <link rel="stylesheet" href="../css/modals.css">

        <style>
            .titulo-contacto {
  font-family: 'Noto Serif Display', serif;
  font-weight: bold;
  color: var(--primaryColor);
  background: linear-gradient(to right, var(--primaryColor), var(--secundaryColor));
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}

.descripcion-contacto {
  max-width: 700px;
  margin: 0 auto;
  font-size: 1.1rem;
  color: #444;
}

        </style>
    
</head>
<body>
  <div id="modalContainerProductos" class="modalContainerProductos"><!--Muestra el detalle de cada producto al hacer click-->
  </div>
<div class="principalContainer">
    <header class="header">
             <?php require_once $_SERVER["DOCUMENT_ROOT"]."/preval_web/pages/parcials/navegacion.php" ?>

        <h1 class="header__title">Preval</h1>
        <img class="header__img" src="../img/logo_s-removebg-preview.png" alt="">
    </header>
   </div>
   <section class="container my-5">
  <h2 class="text-center mb-4 titulo-contacto" >Contáctanos</h2>
  <p class="text-center mb-5 descripcion-contacto">
    Si deseas más información sobre nuestros servicios o productos, por favor completa el siguiente formulario y nos pondremos en contacto contigo lo antes posible.
  </p>

  <div class="row g-4">
    <!-- Formulario -->
    <div class="col-md-6">
      <form action="" method="POST">
        <div class="mb-3">
          <label for="nombre" class="form-label">Nombre completo</label>
          <input name="nombre" type="text" class="form-control" id="nombre" placeholder="Ej. Luis Ubillus" required>
        </div>
        <div class="mb-3">
          <label for="correo" class="form-label">Correo electrónico</label>
          <input name="correo" type="email" class="form-control" id="correo" placeholder="correo@ejemplo.com" required>
        </div>
        <div class="mb-3">
          <label for="mensaje" class="form-label">Comentario</label>
          <textarea name="comentario" class="form-control" id="mensaje" rows="5" placeholder="Escribe tu mensaje aquí..." required></textarea>
        </div>
        <button type="submit" class="btn btn-primary w-100">Enviar mensaje</button>
      </form>
    </div>
    <?php if (!empty($mensaje)): ?>
      <div class="col-12 mt-3">
        <div class="alert alert-info text-center"><?= htmlspecialchars($mensaje) ?></div>
      </div>
    <?php endif; ?>
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

</body>
</html>