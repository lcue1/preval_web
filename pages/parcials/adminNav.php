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
  
  /* Navbar principal mejorada */
  .navbar {
    background-color: var(--primaryColor) !important;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    padding: 0.5rem 1rem;
  }
  
  .navbar-text {
    color: var(--textColor) !important;
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 8px;
  }
  
  .btn-outline-light {
    color: var(--textColor);
    border-color: var(--textColor);
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 6px;
  }
  
  .btn-outline-light:hover {
    background-color: rgba(255, 255, 255, 0.1);
  }
  
  /* Menú lateral (offcanvas) mejorado */
  .offcanvas-start {
    background-color: var(--primaryColor) !important;
    color: var(--textColor);
    border-right: 1px solid rgba(80, 172, 221, 0.1);
  }
  
  .offcanvas-header {
    border-bottom: 1px solid rgba(80, 172, 221, 0.2);
    padding-bottom: 1rem;
  }
  
  /* Items del menú mejorados */
  .nav-link {
    color: var(--textColor) !important;
    transition: all 0.3s ease;
    padding: 12px 16px !important;
    border-radius: 6px;
    margin: 4px 0;
    display: flex;
    align-items: center;
    gap: 12px;
    font-weight: 400;
    position: relative;
    overflow: hidden;
  }
  
  .nav-link:hover {
    background-color: rgba(80, 172, 221, 0.15) !important;
    color: var(--secundaryColor) !important;
    transform: translateX(5px);
  }
  
  .nav-link::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    width: 3px;
    background: var(--secundaryColor);
    transform: scaleY(0);
    transition: transform 0.3s ease;
    transform-origin: bottom;
  }
  
  .nav-link:hover::before {
    transform: scaleY(1);
    transform-origin: top;
  }
  
  /* Botón cerrar */
  .btn-close-white {
    filter: invert(1) grayscale(100%) brightness(200%);
    opacity: 0.8;
    transition: opacity 0.3s ease;
  }
  
  .btn-close-white:hover {
    opacity: 1;
  }
  
  /* Botón de salir */
  .logout-btn {
    background: transparent;
    border: none;
    width: 100%;
    text-align: left;
    color: inherit !important;
    padding: 0 !important;
  }
  
  .logout-btn:hover {
    color: #ff6b6b !important;
  }
  
  /* Separador */
  .menu-divider {
    height: 1px;
    background: rgba(80, 172, 221, 0.2);
    margin: 12px 0;
  }
</style>

<!-- Navbar mejorada -->
<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <button class="btn btn-outline-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu">
      <i class="bi bi-list"></i> Menú
    </button>

    <span class="navbar-text">
      <i class="bi bi-person-circle"></i> 
      <?= $_SESSION['name'] ?>
    </span>
  </div>
</nav>

<!-- Menú lateral mejorado -->
<div class="offcanvas offcanvas-start text-white" tabindex="-1" id="sidebarMenu">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title d-flex align-items-center gap-2">
      <i class="bi bi-grid"></i> Panel de Control
    </h5>
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
  </div>
  <div class="offcanvas-body">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link" href="/preval_web/pages/system/">
          <i class="bi bi-house-door"></i> Inicio
        </a>
      </li>
      
      <?php if ($_SESSION['rol'] == 'admin'): ?>
      <li class="nav-item">
        <a class="nav-link" href="/preval_web/pages/system/users.php">
          <i class="bi bi-people"></i> Gestionar Usuarios
        </a>
      </li>
      <?php endif; ?>
      
      <li class="nav-item">
        <a class="nav-link" href="/preval_web/pages/system/coments.php">
          <i class="bi bi-chat-square-text"></i> Gestionar Comentarios
        </a>
      </li>
      
      <div class="menu-divider"></div>
      
      <li class="nav-item">
        <form action="/preval_web/includes/logout.php" method="POST">
          <button type="submit" class="nav-link logout-btn">
            <i class="bi bi-box-arrow-right"></i> Salir
          </button>
        </form>      
      </li>
    </ul>
  </div>
</div>