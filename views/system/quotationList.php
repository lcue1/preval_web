<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cotizaciones</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body>

<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/preval_web/includes/auth.php"; 
verifySession();
require_once $_SERVER["DOCUMENT_ROOT"]."/preval_web/parcials/employerNab.php"; 
require_once $_SERVER["DOCUMENT_ROOT"]."/preval_web/utils/flashMessage.php";

?>

<!-- Contenido principal -->
<main class="col-sm-12 col-md-9 col-lg-10">
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


</main>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
