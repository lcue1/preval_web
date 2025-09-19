<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materiales</title>
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
        <link rel="stylesheet" href="../css/materiales.css  ">
          <link rel="icon" type="image/png" href="../img/logo_s-removebg-preview.png">
</head>
<body>
  <div id="modalContainerProductos" class="modalContainerProductos"><!--Muestra el detalle de cada producto al hacer click-->
  </div>
<div class="principalContainer">
    <header class="header">
     
       <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/preval_web/parcials/navegacion.php"; ?>

        <h1 class="header__title">Preval</h1>
        <img class="header__img" src="../img/logo_s-removebg-preview.png" alt="">
    </header>
    <main class="container my-5">
  <h2 class="text-center mb-4 titulo-materiales">Materiales que usamos en Preval</h2>
  <p class="text-center mb-5 descripcion-materiales">
    En <strong>Preval</strong> nos especializamos en soluciones industriales de alto rendimiento. Por eso empleamos materiales avanzados seleccionados por su calidad, resistencia, durabilidad y adaptabilidad a distintos entornos industriales y arquitectónicos. A continuación, te presentamos los materiales más importantes que forman parte de nuestros procesos constructivos.
  </p>

  <div class="row g-4">
    <!-- Hierro estructural -->
    <div class="col-md-6">
      <div class="card material-card h-100">
        <img src="../img/img_materiales/metales.jpg" class="card-img-top" alt="Hierro estructural">
        <div class="card-body">
          <h5 class="card-title">Hierro estructural</h5>
          <p class="card-text">
            El hierro es uno de los pilares fundamentales en la industria de estructuras metálicas. Su alta resistencia a la compresión y capacidad de carga lo hacen ideal para columnas, vigas, techados y marcos resistentes. Además, se integra perfectamente con otros elementos como concreto armado o acero inoxidable.
          </p>
        </div>
      </div>
    </div>

    <!-- Fibra de vidrio -->
    <div class="col-md-6">
      <div class="card material-card h-100">
        <img src="../img/img_materiales/fibra_polvo.jpg" class="card-img-top" alt="Fibra de vidrio">
        <div class="card-body">
          <h5 class="card-title">Fibra de vidrio</h5>
          <p class="card-text">
            Usamos fibra de vidrio para revestimientos de piscinas, tanques y estructuras expuestas al desgaste ambiental. Sus propiedades anticorrosivas, ligereza y flexibilidad la convierten en un material confiable para ambientes marinos e industriales. Además, proporciona un acabado liso, impermeable y estéticamente superior.
          </p>
        </div>
      </div>
    </div>

    <!-- Acero inoxidable -->
    <div class="col-md-6">
      <div class="card material-card h-100">
        <img src="../img/img_materiales/acero.jpg" class="card-img-top" alt="Acero inoxidable">
        <div class="card-body">
          <h5 class="card-title">Acero inoxidable</h5>
          <p class="card-text">
            Recomendado para instalaciones que requieren higiene, estética y resistencia a la corrosión, como laboratorios, plantas alimenticias o exteriores con humedad constante. El acero inoxidable combina belleza, limpieza fácil y fortaleza, garantizando una larga vida útil con bajo mantenimiento.
          </p>
        </div>
      </div>
    </div>

    <!-- Policarbonato -->
    <div class="col-md-6">
      <div class="card material-card h-100">
        <img src="../img/img_materiales/policatbonato.jpg" class="card-img-top" alt="Policarbonato">
        <div class="card-body">
          <h5 class="card-title">Policarbonato</h5>
          <p class="card-text">
            Este polímero translúcido es ideal para techados, invernaderos y cerramientos modernos. Su resistencia a los impactos, aislamiento térmico y protección UV lo convierten en un favorito para proyectos donde se requiere iluminación natural sin sacrificar durabilidad ni seguridad.
          </p>
        </div>
      </div>
    </div>
  </div>
</main>

<!-- Futter -->
    <footer class="text-white pt-5 pb-4 futter">
  <div class="container text-center text-md-start">
    <div class="row text-center text-md-start">
      <!-- Columna 1: Logo y descripción -->
      <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
        <h5 class="text-uppercase mb-4 font-weight-bold futter__title" >Preval</h5>
        <p>Encuentra recubrimientos, tanques resevorios, filtrado de agua y mas que se ajusten a tus necesidades..</p>
      </div>

      <!-- Columna 2: Enlaces rápidos -->
      <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
        <h5 class="text-uppercase mb-4 font-weight-bold">Enlaces</h5>
        <p><a href="#" class="text-white text-decoration-none">Inicio</a></p>
        <p><a href="#" class="text-white text-decoration-none">Productos</a></p>
        <p><a href="#" class="text-white text-decoration-none">Ofertas</a></p>
        <p><a href="#" class="text-white text-decoration-none">Contacto</a></p>
      </div>

      <!-- Columna 3: Contacto -->
      <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
        <h5 class="text-uppercase mb-4 font-weight-bold">Contacto</h5>
        <p><i class="bi bi-geo-alt-fill me-2"></i> Quito (San Antonio de Pichincha) , Ecuador</p>
        <p><i class="bi bi-envelope-fill me-2"></i> contacto@preval.com</p>
        <p><i class="bi bi-phone-fill me-2"></i> +593 987654321`</p>
      </div>

      <!-- Columna 4: Redes sociales -->
      <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mt-3">
        <h5 class="text-uppercase mb-4 font-weight-bold">Síguenos</h5>
        <a href="#" class="text-white me-3 fs-4"><i class="fab fa-instagram"></i></a>
        <a href="#" class="text-white me-3 fs-4"><i class="fab fa-x-twitter"></i></a>
        <a href="#" class="text-white me-3 fs-4"><i class="fab fa-tiktok"></i></a>

    </div>
    </div>

    <!-- Línea horizontal -->
    <hr class="mb-4 mt-4" style="border-color: rgba(255, 255, 255, 0.2);">

    <!-- Footer bottom -->
    <div class="row align-items-center">
      <div class="col-md-7 col-lg-8">
        <p class="text-white mb-0">&copy; 2025 Prevalp. Todos los derechos reservados.</p>
      </div>
      <div class="col-md-5 col-lg-4">
        <div class="text-center text-md-end">
          <a href="#" class="text-white text-decoration-none">Política de privacidad</a>
        </div>
      </div>
    </div>
  </div>
  </footer>
  
   </div>
   <script src="/preval_web/js/main.js"></script>

</body>
</html>