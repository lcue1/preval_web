<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/preval_web/includes/auth.php"; 
directAccesDeniged();
?>
<style>
  :root {
    --primaryColor: #0e1b2e;
    --secundaryColor: #50acdd;
    --textColor: #fff;
    --fontFamily: 'Poppins', sans-serif;
  }
  
  /* Navbar principal */
  .navbar {
    background-color: var(--primaryColor) !important;
  }
  
  .navbar-text {
    color: var(--textColor) !important;
  }
  
  .btn-outline-light {
    color: var(--textColor);
    border-color: var(--textColor);
  }
  
  /* Menú lateral (offcanvas) */
  .offcanvas-start {
    background-color: var(--primaryColor) !important;
    color: var(--textColor);
  }
  
  /* Items del menú */
  .nav-link {
    color: var(--textColor) !important;
    transition: all 0.3s ease;
    padding: 8px 12px;
    border-radius: 4px;
    margin: 2px 0;
  }
  
  .nav-link:hover {
    background-color: rgba(80, 172, 221, 0.2) !important;
    color: var(--secundaryColor) !important;
    transform: translateX(5px);
  }
  
  /* Botón cerrar */
  .btn-close-white {
    filter: invert(1) grayscale(100%) brightness(200%);
  }
</style>

<!-- Navbar con botón para abrir el menú lateral -->
<nav class="navbar">
  <div class="container-fluid navbar">
    <button class="btn btn-outline-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu">
      ☰
    </button>

    <span class="navbar-text"><i class="bi bi-person-circle"></i> <?=  $_SESSION['name'] ?> </span>
  </div>
</nav>

<!-- Menú lateral (offcanvas) -->
<div class="offcanvas offcanvas-start text-white" tabindex="-1" id="sidebarMenu">
  <div class="offcanvas-header">
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
  </div>
  <div class="offcanvas-body">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link" href="/preval_web/pages/system/">Inicio</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/preval_web/pages/system/users.php">Gestionar Usuarios</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/preval_web/pages/system/coments.php">Gestionar Comentarios</a>
      </li>
    </ul>
  </div>
</div>