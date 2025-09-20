

<link rel="stylesheet" href="/preval_web/css/reset.css">
<link rel="stylesheet" href="/preval_web/css/header.css">
<?php
// Get the current page name
$current_page = basename($_SERVER['PHP_SELF']); //allows set active class to nav links
?>
<header>

    <img class="header__img" src="/preval_web/img/logo_preval_s.png" alt="Logo de preval">
    <h1 class="header__title">Preval</h1>
    <nav class="navigationbar">
    <a href="#" class="navbar__btnContainer" id="btnMenu">
        <i class="fas fa-bars navbar__icon"></i>
    </a>
    <ul class="navbarContainer" id="navbarContainer">
        <li class="navbarContainer__item">
            <a 
                href="/preval_web/index.php" 
                class="navbarContainer__link <?= ($current_page == 'index.php') ? 'active' : '' ?>"
            >
                Inicio
            </a>
        </li>
        <li class="navbarContainer__item">
            <a 
                href="/preval_web/public    /productos.php" 
                class="navbarContainer__link <?= ($current_page == 'productos.php') ? 'active' : '' ?>"
            >
                Productos
            </a>
        </li>
        <li class="navbarContainer__item">
            <a 
                href="/preval_web/public/materiales.php" 
                class="navbarContainer__link <?= ($current_page == 'materiales.php') ? 'active' : '' ?>"
            >
                Materiales
            </a>
        </li>
        <li class="navbarContainer__item">
            <a 
                href="/preval_web/public/contacto.php" 
                class="navbarContainer__link <?= ($current_page == 'contacto.php') ? 'active' : '' ?>"
            >
            
                Contacto
            </a>
        </li>
        <li class="navbarContainer__item">
            <a 
                id="sistemLink"
                href="/preval_web/public/login.php" 
                class="navbarContainer__link <?= ($current_page == 'login.php') ? 'active' : '' ?>"
            >
                Empleados
            </a>
        </li>
    </ul>
    
    </nav>
</header>
