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
    
    <link rel="stylesheet" href="/preval_web/css/body.css">
    <link rel="icon" type="image/png" href="/preval_web/img/logo_s.jpg"> 


</head>
<body>
  
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/preval_web/parcials/header.php"; ?>
        
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
<main role="main" itemscope itemtype="https://schema.org/AboutPage">
  <div class="container my-5">
    <h2 class="text-center mb-4 subtitle" itemprop="headline">Descubre lo que hacemos</h2>
    <div class="row g-4">

      <!-- 1. Fibra de vidrio -->
      <div class="col-sm-12 col-md-6 col-lg-6" itemprop="mainEntity" itemscope itemtype="https://schema.org/Product">
        <div class="card h-100 shadow">
          <img src="./img/img_main/rollo-fibra.jpg" class="card-img-top" alt="Fibra de vidrio" itemprop="image">
          <div class="card-body">
            <h5 class="card-title" itemprop="name">¿Por qué usar fibra de vidrio en Preval?</h5>
            <p class="card-text" itemprop="description">
              La fibra de vidrio es uno de los materiales más innovadores y versátiles en la industria de los tanques. En Preval la elegimos porque ofrece una combinación única de resistencia mecánica, liviandad y durabilidad frente a la corrosión, lo que la hace perfecta para almacenar agua, químicos u otros líquidos en condiciones exigentes. Además, su bajo peso facilita el transporte e instalación, y su mantenimiento es prácticamente nulo. Es una inversión que se traduce en tranquilidad y eficiencia a largo plazo.
            </p>
          </div>
        </div>
      </div>

      <!-- 2. Transporte -->
      <div class="col-sm-12 col-md-6 col-lg-6" itemprop="mainEntity" itemscope itemtype="https://schema.org/Service">
        <div class="card h-100 shadow">
          <img src="./img/img_main/transporte.jpeg" class="card-img-top" alt="Transporte" itemprop="image">
          <div class="card-body">
            <h5 class="card-title" itemprop="name">Transporte eficiente y seguro</h5>
            <p class="card-text" itemprop="description">
              Nuestro compromiso va más allá de fabricar tanques de calidad. En Preval también nos encargamos de que lleguen a su destino de forma rápida, segura y sin contratiempos. Utilizamos vehículos adaptados al transporte de grandes estructuras, con sistemas de fijación que protegen cada unidad. Cada entrega es monitoreada y coordinada cuidadosamente para cumplir con los plazos y preservar la integridad del producto. Porque entendemos que cada minuto cuenta para nuestros clientes.
            </p>
          </div>
        </div>
      </div>

      <!-- 3. Purificación de agua -->
      <div class="col-sm-12 col-md-6 col-lg-6" itemprop="mainEntity" itemtype="https://schema.org/Service">
        <div class="card h-100 shadow">
          <img src="./img/img_main/purificacion.jpg" class="card-img-top" alt="Purificación de agua" itemprop="image">
          <div class="card-body">
            <h5 class="card-title" itemprop="name">Purificación de agua</h5>
            <p class="card-text" itemprop="description">
              Pensando en la salud y sostenibilidad, diseñamos tanques con sistemas de filtración integrados que permiten almacenar y purificar el agua en un solo equipo. Esta solución es ideal para zonas rurales, industrias, urbanizaciones o comunidades que buscan mejorar la calidad del agua que consumen. Así, nuestros tanques no solo almacenan, sino que contribuyen a garantizar un recurso vital libre de contaminantes, cumpliendo con estándares de calidad para el uso humano o industrial.
            </p>
          </div>
        </div>
      </div>

      <!-- 4. Instalación -->
      <div class="col-sm-12 col-md-6 col-lg-6" itemprop="mainEntity" itemtype="https://schema.org/Service">
        <div class="card h-100 shadow">
          <img src="./img/img_main/instalacion.jpeg" class="card-img-top" alt="Instalación" itemprop="image">
          <div class="card-body">
            <h5 class="card-title" itemprop="name">Instalación profesional</h5>
            <p class="card-text" itemprop="description">
              Cada proyecto requiere precisión, y en Preval lo sabemos. Por eso, nuestro equipo técnico está entrenado para realizar instalaciones rápidas, limpias y totalmente funcionales desde el primer momento. Nos encargamos de la ubicación, conexión y pruebas necesarias para que el tanque funcione sin inconvenientes desde el día uno. Además, brindamos asesoría en el sitio para maximizar la eficiencia del sistema según el entorno o uso específico del cliente.
            </p>
          </div>
        </div>
      </div>

      <!-- 5. Durabilidad -->
      <div class="col-sm-12 col-md-6 col-lg-6" itemprop="mainEntity" itemtype="https://schema.org/Product">
        <div class="card h-100 shadow">
          <img src="./img/img_main/durabilidad.jpeg" class="card-img-top" alt="Durabilidad" itemprop="image">
          <div class="card-body">
            <h5 class="card-title" itemprop="name">Durabilidad de la fibra de vidrio</h5>
            <p class="card-text" itemprop="description">
              Cada proyecto requiere precisión, y en Preval lo sabemos. Por eso, nuestro equipo técnico está entrenado para realizar instalaciones rápidas, limpias y totalmente funcionales desde el primer momento. Nos encargamos de la ubicación, conexión y pruebas necesarias para que el tanque funcione sin inconvenientes desde el día uno. Además, brindamos asesoría en el sitio para maximizar la eficiencia del sistema según el entorno o uso específico del cliente.
            </p>
          </div>
        </div>
      </div>

      <!-- 6. Eficiencia empresarial -->
      <div class="col-sm-12 col-md-6 col-lg-6" itemprop="mainEntity" itemtype="https://schema.org/Service">
        <div class="card h-100 shadow">
          <img src="./img/img_main/crecimiento_emp.jpg" class="card-img-top" alt="Eficiencia empresarial" itemprop="image">
          <div class="card-body">
            <h5 class="card-title" itemprop="name">Eficiencia empresarial</h5>
            <p class="card-text" itemprop="description">
              Nuestro equipo técnico altamente calificado se encarga de instalar los tanques con rapidez y precisión. Garantizamos una puesta en marcha inmediata, cumpliendo con todas las normativas técnicas y asegurando un funcionamiento eficiente desde el primer día.
            </p>
          </div>
        </div>
      </div>

      <!-- 7. Reciclaje -->
      <div class="col-sm-12 col-md-6 col-lg-6" itemprop="mainEntity" itemtype="https://schema.org/Service">
        <div class="card h-100 shadow">
          <img src="./img/img_main/reciclado-de-agua.jpg" class="card-img-top" alt="Reciclaje y medio ambiente" itemprop="image">
          <div class="card-body">
            <h5 class="card-title" itemprop="name">Reciclaje y medio ambiente</h5>
            <p class="card-text" itemprop="description">
              Diseñamos nuestros productos pensando en el futuro: materiales de larga vida útil, bajo impacto ambiental y mínimo mantenimiento. En Preval, promovemos soluciones que ayudan a una mejor gestión del agua y del entorno, cuidando hoy lo que importa mañana.
            </p>
          </div>
        </div>
      </div>

      <!-- 8. Sostenibilidad -->
      <div class="col-sm-12 col-md-6 col-lg-6" itemprop="mainEntity" itemtype="https://schema.org/Service">
        <div class="card h-100 shadow">
          <img src="./img/img_main/sostenibilidad.jpg" class="card-img-top" alt="Sostenibilidad" itemprop="image">
          <div class="card-body">
            <h5 class="card-title" itemprop="name">Compromiso con la sostenibilidad</h5>
            <p class="card-text" itemprop="description">
              En Preval creemos que la sostenibilidad no es una opción, sino una responsabilidad. Diseñamos nuestros tanques con materiales duraderos, de bajo mantenimiento y con una larga vida útil, lo que se traduce en menos residuos y menos reemplazos a lo largo del tiempo. Además, promovemos prácticas de producción responsables que reducen el impacto ambiental y fomentan la gestión eficiente del agua, apoyando el desarrollo sostenible en comunidades, industrias y hogares.
            </p>
          </div>
        </div>
      </div>

    </div>
  </div>
</main>
</div><!--fin main-->
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/preval_web/parcials/footer.php"; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="./js/main.js"></script>

</body>
</html> 