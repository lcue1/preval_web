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
        <link rel="stylesheet" href="../css/body.css">
    <link rel="icon" type="image/png" href="/preval_web/img/logo_s.jpg"> 
    
    
</head>
<body>
  
   
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/preval_web/parcials/header.php"; ?>
<!-- Modals -->
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/preval_web/modals/productsModal.php"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/preval_web/modals/coattingModal.php"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/preval_web/modals/purifiersModal.php"; ?>


   
    <!--productos--><div class="container my-5">
      
  <h2 class="text-center mb-4 subtitle" >Productos y servicios</h2>
  <div class="row justify-content-center">
    
    <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
      <div class="card custom-card-hover h-100">
        <img src="../img/img_productos/tanque 20mil_lt.jpeg" alt="Imagen producto tanque con filtro" class="card-img-top customProduct__img">
        <div class="card-body">
          <h5 class="card-title">Tanques reservorio</h5>
          <p class="card-text">
            Elaboramos tanques reservorios ideales para el almacenamiento de agua en diferentes capacidades. Su diseño robusto garantiza resistencia y durabilidad para usos domésticos, agrícolas e industriales.
            .</p>
        <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#productModal">Ver más</a>
        </div>
      </div>
    </div>

    <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
      <div class="card custom-card-hover h-100">
        <img src="../img/img_productos/recubrimiento.jpg" alt="Imagen producto tanque con filtro" class="card-img-top customProduct__img">
        <div class="card-body">
          <h5 class="card-title">Recubrimiento en fibra de vidrio</h5>
          <p class="card-text">
Aplicamos recubrimientos con fibra de vidrio que refuerzan la estructura interna de los tanques, piscinas o estanques, protegiéndolos contra la corrosión, los rayos UV.
          </p>
<a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#coattingModal">Ver más</a>
        </div>
      </div>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
      <div class="card custom-card-hover h-100">
        <img src="../img/img_productos/purificador.jpeg" alt="Imagen recubrimiento " class="card-img-top customProduct__img">
        <div class="card-body">
          <h5 class="card-title">Purificadores de agua</h5>
          <p class="card-text">
            Los purificadores de agua eficientes, eliminan impurezas, sedimentos y microorganismos, asegurando un suministro limpio, puro  y seguro para el consumo de los habitantes de la comunidad.
          </p>
<a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#purifiersModal">Ver más</a>
        </div>
      </div>
    </div>

    <!--Transporte-->
    <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
      <div class="card custom-card-hover h-100">
        <img src="../img/img_productos/transporte.jpeg" alt="Imagen recubrimiento " class="card-img-top customProduct__img">
        <div class="card-body">
          <h5 class="card-title">Transporte</h5>
          <p class="card-text">
Gestionamos el transporte de equipos y estructuras de gran volumen o peso, garantizando seguridad, puntualidad y eficiencia en cada traslado.          </p>
          <a href="#" class="btn btn-primary">Ver más</a>
        </div>
      </div>
    </div>

    <!--Estructuras-->
    <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
      <div class="card custom-card-hover h-100">
        <img src="../img/img_productos/estructuras.jpg" alt="Imagen recubrimiento " class="card-img-top customProduct__img">
        <div class="card-body">
          <h5 class="card-title">Estructuras</h5>
          <p class="card-text">
Diseñamos y fabricamos estructuras metálicas resistentes para naves industriales, cubiertas, soportes y más, adaptadas a las necesidades de cada proyecto.          </p>
          <a href="#" class="btn btn-primary">Ver más</a>
        </div>
      </div>
    </div>

    
    <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
      <div class="card custom-card-hover h-100">
        <img src="../img/img_productos/gruas.jpeg" alt="Imagen recubrimiento " class="card-img-top customProduct__img">
        <div class="card-body">
          <h5 class="card-title">Gruas</h5>
          <p class="card-text">
Contamos con grúas hidráulicas de alta capacidad para izaje y montaje de cargas pesadas en obras industriales, comerciales y de infraestructura.          </p>
          <a href="#" class="btn btn-primary">Ver más</a>
        </div>
      </div>
    </div>


  </div><!--fin row-->

</div><!--fin productos-->

<!-- Futter -->
 <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/preval_web/parcials/footer.php"; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="../js/main.js"></script>


<script>
 //showModal('../modals/recubrimientosModal.html')
  function showModal(){
  
    
  }
</script>



</body>
</html>