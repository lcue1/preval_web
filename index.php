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
    
        <link rel="stylesheet" href="./css/reset.css">
        <link rel="stylesheet" href="./css/styles.css">
    
</head>
<body>
     <!-- 
    
    <div class="initModalScreem" id="initModalScreen">
a       <p class="initModalScreem--text" id="textInitModalScreen"></p>
    </div>
     -->
<div class="principalContainer">
    <header class="header">
       <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/preval_web/pages/parcials/navegacion.php"; ?>
        <h1 class="header__title">Preval</h1>
        <img class="header__img" src="./img/logo_s-removebg-preview.png" alt="">
    </header>
<div id="carouselExampleControls" class="carousel slide shadow-lg rounded overflow-hidden" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="./img/ing_carrucel/carrucel1.jpeg" class="d-block w-100 carrucel__img" alt="Entrega tanque 1">
    </div>
    <div class="carousel-item">
      <img src="./img/ing_carrucel/carrucel3.jpeg" class="d-block w-100 carrucel__img" alt="Entrega tanque 2">
    </div>
    <div class="carousel-item">
      <img src="./img/ing_carrucel/carrucel2.jpeg" class="d-block w-100 carrucel__img" alt="Instalación tanque">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon custom-arrow" aria-hidden="true"></span>
    <span class="visually-hidden">Anterior</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon custom-arrow" aria-hidden="true"></span>
    <span class="visually-hidden">Siguiente</span>
  </button>
</div>

    <!-- Main -->
     <div class="container my-5">
        <h2>Descubre lo que hacemos.</h2>
  <div class="row g-4">

    <!-- 1. Fibra de vidrio -->
    <div class="col-sm-12 col-md-6 col-lg-6">
      <div class="card h-100 shadow">
        <img src="./img/img_main/rollo-fibra.jpg" class="card-img-top" alt="Fibra de vidrio">
        <div class="card-body">
          <h5 class="card-title">¿Por qué usar fibra de vidrio en Preval?</h5>
          <p class="card-text">
La fibra de vidrio es uno de los materiales más innovadores y versátiles en la industria de los tanques. En Preval la elegimos porque ofrece una combinación única de resistencia mecánica, liviandad y durabilidad frente a la corrosión, lo que la hace perfecta para almacenar agua, químicos u otros líquidos en condiciones exigentes. Además, su bajo peso facilita el transporte e instalación, y su mantenimiento es prácticamente nulo. Es una inversión que se traduce en tranquilidad y eficiencia a largo plazo.
</p>

        </div>
      </div>
    </div>

    <!-- 2. Transporte -->
    <div class="col-sm-12 col-md-6 col-lg-6">
      <div class="card h-100 shadow">
        <img src="./img/img_main/transporte.jpeg" class="card-img-top" alt="Transporte">
        <div class="card-body">
          <h5 class="card-title">Transporte eficiente y seguro</h5>
          <p class="card-text">
Nuestro compromiso va más allá de fabricar tanques de calidad. En Preval también nos encargamos de que lleguen a su destino de forma rápida, segura y sin contratiempos. Utilizamos vehículos adaptados al transporte de grandes estructuras, con sistemas de fijación que protegen cada unidad. Cada entrega es monitoreada y coordinada cuidadosamente para cumplir con los plazos y preservar la integridad del producto. Porque entendemos que cada minuto cuenta para nuestros clientes.
          </p>
        </div>
      </div>
    </div>

    <!-- 3. Purificación de agua -->
    <div class="col-sm-12 col-md-6 col-lg-6">
      <div class="card h-100 shadow">
        <img src="./img/img_main/purificacion.jpg" class="card-img-top" alt="Purificación de agua">
        <div class="card-body">
          <h5 class="card-title">Purificación de agua</h5>
        <p class="card-text">
Pensando en la salud y sostenibilidad, diseñamos tanques con sistemas de filtración integrados que permiten almacenar y purificar el agua en un solo equipo. Esta solución es ideal para zonas rurales, industrias, urbanizaciones o comunidades que buscan mejorar la calidad del agua que consumen. Así, nuestros tanques no solo almacenan, sino que contribuyen a garantizar un recurso vital libre de contaminantes, cumpliendo con estándares de calidad para el uso humano o industrial.</p>
        </div>
      </div>
    </div>

    <!-- 4. Instalación -->
    <div class="col-sm-12 col-md-6 col-lg-6">
      <div class="card h-100 shadow">
        <img src="./img/img_main/instalacion.jpeg" class="card-img-top" alt="Instalación">
        <div class="card-body">
          <h5 class="card-title">Instalación profesional</h5>
          <p class="card-text">
Cada proyecto requiere precisión, y en Preval lo sabemos. Por eso, nuestro equipo técnico está entrenado para realizar instalaciones rápidas, limpias y totalmente funcionales desde el primer momento. Nos encargamos de la ubicación, conexión y pruebas necesarias para que el tanque funcione sin inconvenientes desde el día uno. Además, brindamos asesoría en el sitio para maximizar la eficiencia del sistema según el entorno o uso específico del cliente.

          </p>
        </div>
      </div>
    </div>

    <!-- 5. Durabilidad -->
    <div class="col-sm-12 col-md-6 col-lg-6">
      <div class="card h-100 shadow">
        <img src="./img/img_main/durabilidad.jpeg" class="card-img-top" alt="Durabilidad">
        <div class="card-body">
          <h5 class="card-title">Durabilidad de la fibra de vidrio</h5>
         <p class="card-text">
Cada proyecto requiere precisión, y en Preval lo sabemos. Por eso, nuestro equipo técnico está entrenado para realizar instalaciones rápidas, limpias y totalmente funcionales desde el primer momento. Nos encargamos de la ubicación, conexión y pruebas necesarias para que el tanque funcione sin inconvenientes desde el día uno. Además, brindamos asesoría en el sitio para maximizar la eficiencia del sistema según el entorno o uso específico del cliente.</p>
        </div>
      </div>
    </div>

    <!-- 6. Eficiencia empresarial -->
    <div class="col-sm-12 col-md-6 col-lg-6">
      <div class="card h-100 shadow">
        <img src="./img/img_main/crecimiento_emp.jpg" class="card-img-top" alt="Eficiencia empresarial">
        <div class="card-body">
          <h5 class="card-title">Eficiencia empresarial</h5>
         <p class="card-text">
  Nuestro equipo técnico altamente calificado se encarga de instalar los tanques con rapidez y precisión. Garantizamos una puesta en marcha inmediata, cumpliendo con todas las normativas técnicas y asegurando un funcionamiento eficiente desde el primer día.
</p>
        </div>
      </div>
    </div>

    <!-- 7. Reciclaje -->
    <div class="col-sm-12 col-md-6 col-lg-6">
      <div class="card h-100 shadow">
        <img src="./img/img_main/reciclado-de-agua.jpg" class="card-img-top" alt="Reciclaje y medio ambiente">
        <div class="card-body">
          <h5 class="card-title">Reciclaje y medio ambiente</h5>
        <p class="card-text">
  Diseñamos nuestros productos pensando en el futuro: materiales de larga vida útil, bajo impacto ambiental y mínimo mantenimiento. En Preval, promovemos soluciones que ayudan a una mejor gestión del agua y del entorno, cuidando hoy lo que importa mañana.
</p>
        </div>
      </div>
    </div>

    <!-- 8. Sostenibilidad -->
    <div class="col-sm-12 col-md-6 col-lg-6">
      <div class="card h-100 shadow">
        <img src="./img/img_main/sostenibilidad.jpg" class="card-img-top" alt="Sostenibilidad">
        <div class="card-body">
          <h5 class="card-title">Compromiso con la sostenibilidad</h5>
          <p class="card-text">
En Preval creemos que la sostenibilidad no es una opción, sino una responsabilidad. Diseñamos nuestros tanques con materiales duraderos, de bajo mantenimiento y con una larga vida útil, lo que se traduce en menos residuos y menos reemplazos a lo largo del tiempo. Además, promovemos prácticas de producción responsables que reducen el impacto ambiental y fomentan la gestión eficiente del agua, apoyando el desarrollo sostenible en comunidades, industrias y hogares.          </p>
        </div>
      </div>
    </div>

  </div>
</div><!--fin main-->

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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="./js/main.js"></script>

</body>
</html>