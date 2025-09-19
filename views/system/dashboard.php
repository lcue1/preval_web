<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Inicio</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

          <link rel="icon" type="image/png" href="/preval_web/img/logo_s-removebg-preview.png"> 
  <style>
    :root {
      --primaryColor: #0e1b2e;
      --secundaryColor: #50acdd;
      --textColor: #fff;
      --fontFamily: 'Poppins', sans-serif;
    }

    body {
      font-family: var(--fontFamily);
      background-color: var(--primaryColor);
      color: var(--textColor);
      min-height: 100vh;
      margin: 0;
    }

    h1 {
      color: var(--secundaryColor);
      font-weight: 600;
    }

    .info-card {
      background-color: #ffffff10;
      border: 1px solid var(--secundaryColor);
      border-radius: 15px;
      backdrop-filter: blur(6px);
      transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .info-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 20px rgba(0,0,0,0.3);
    }

    .info-card h5 {
      color: var(--secundaryColor);
      font-weight: 600;
    }

    .info-card i {
      font-size: 2rem;
      color: var(--secundaryColor);
    }

    /* Contenedor principal con padding para no quedar pegado al navbar */
    main {
      padding-top: 80px; /* Ajusta según el alto del navbar */
    }
  </style>
</head>
<body>

<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/preval_web/includes/auth.php"; 
verifySession();
require_once $_SERVER["DOCUMENT_ROOT"]."/preval_web/parcials/employerNab.php"; 
?>

<!-- Contenido principal -->
<main class="container py-5">
  <!-- Título principal -->
  <div class="text-center mb-5">
    <h1>Sistema Preval</h1>
    <p class="lead">Bienvenido al portal interno. Usa el menú lateral para acceder a las funciones según tu perfil de usuario.</p>
  </div>

  <!-- Cuatro bloques informativos -->
  <div class="row g-4">
    <div class="col-md-6">
      <div class="card info-card p-4 h-100">
        <div class="d-flex align-items-start">
          <i class="bi bi-people-fill me-3"></i>
          <div>
            <h5>Gestión de usuarios y roles</h5>
            <p>Administra empleados y define sus roles de acceso para garantizar seguridad y organización en los procesos internos.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card info-card p-4 h-100">
        <div class="d-flex align-items-start">
          <i class="bi bi-box-seam me-3"></i>
          <div>
            <h5>Control de productos y materiales</h5>
            <p>Registra y actualiza productos y materiales de la empresa desde el menú lateral, manteniendo un inventario actualizado.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card info-card p-4 h-100">
        <div class="d-flex align-items-start">
          <i class="bi bi-chat-dots-fill me-3"></i>
          <div>
            <h5>Atención a clientes</h5>
            <p>Revisa y responde comentarios o solicitudes de clientes para mejorar la comunicación y ofrecer un mejor servicio.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card info-card p-4 h-100">
        <div class="d-flex align-items-start">
          <i class="bi bi-file-earmark-text-fill me-3"></i>
          <div>
            <h5>Módulo de cotizaciones</h5>
            <p>Crea, consulta, actualiza o elimina cotizaciones de clientes según tu perfil de usuario, optimizando el proceso comercial.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
