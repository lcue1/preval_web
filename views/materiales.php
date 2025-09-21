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

  <link rel="stylesheet" href="/preval_web/css/reset.css">
  <link rel="stylesheet" href="/preval_web/css/body.css">
  <link rel="icon" type="image/png" href="/preval_web/img/logo_s.jpg"> 

</head>

<body>

    <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/preval_web/parcials/header.php"; ?>

    <main class="container my-5">
      <h2 class="text-center mb-4 subtitle">Materiales que usamos en Preval</h2>
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
    </main>

    <!-- Futter -->
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/preval_web/parcials/footer.php"; ?>

  </div>
  <script src="/preval_web/js/main.js"></script>

</body>

</html>