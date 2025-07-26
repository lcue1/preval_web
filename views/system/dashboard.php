<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Inicio</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body>

<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/preval_web/includes/auth.php"; 
verifySession();
require_once $_SERVER["DOCUMENT_ROOT"]."/preval_web/parcials/adminNav.php"; 

?>

<!-- Contenido principal -->
<main class="col-sm-12 col-md-9 col-lg-10">
  <h2>Bienvenido <?= $_SESSION['name'] ?></h2>
  <p>Seleccione una opción del menú para comenzar.</p>
</main>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
