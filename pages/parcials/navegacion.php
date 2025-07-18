<style>
    .active {
    border-bottom: 2px solid #50acdd;
}
</style>
<?php
// Obtener el nombre del archivo actual (ej: "index.php")
$current_page = basename($_SERVER['PHP_SELF']); 
?>

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
                href="/preval_web/pages/productos.php" 
                class="navbarContainer__link <?= ($current_page == 'productos.php') ? 'active' : '' ?>"
            >
                Productos
            </a>
        </li>
        <li class="navbarContainer__item">
            <a 
                href="/preval_web/pages/materiales.php" 
                class="navbarContainer__link <?= ($current_page == 'materiales.php') ? 'active' : '' ?>"
            >
                Materiales
            </a>
        </li>
        <li class="navbarContainer__item">
            <a 
                href="/preval_web/pages/contacto.php" 
                class="navbarContainer__link <?= ($current_page == 'contacto.php') ? 'active' : '' ?>"
            >
            
                Contacto
            </a>
        </li>
        <li class="navbarContainer__item">
            <a 
                id="sistemLink"
                href="/preval_web/pages/login.php" 
                class="navbarContainer__link <?= ($current_page == 'login.php') ? 'active' : '' ?>"
            >
                Empleados
            </a>
        </li>
    </ul>
</nav>