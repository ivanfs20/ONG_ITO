<?php
/*************************************************************/
/* Archivo:  sesionadmin.php
 * Objetivo: Menu principal para el administrador
 * Autor: Uriel Vallejo Xicalhua
 *************************************************************/
$customStyles = '<link rel="stylesheet" href="../view/css/vistas/sesionadmin.css">'; #cargamos el estilo en especifico de contacto.php
$customScript = '<script src="../view/js/script1.js"></script>'; #cargamos el script
include_once("modules/header.html");  # Incluye <head> y apertura de <body>
include_once("modules/navbar.php");   # Navbar

?>
<!-- #HERO SECTION -->
<section class="hero">
    <div class="hero-contenido">
        <h1 class="hero-titulo">"Bienvenido al panel de gestión, [nombre]. Tu labor mantiene viva la misión de esta ONG. Cada dato que administras ayuda a construir un impacto real."</h1>

    </div>
</section>

<!-- Sección Áreas de Apoyo -->
<section class="areas-section">
    <div class="areas-container">
        <h2 class="section-title">Secciones CRUD principales:</h2>

        <div class="areas-grid">
            <!-- Tarjeta 1 - Donaciones -->
            <div class="area-card">
                <i class="fas fa-book-open fa-3x area-icon"></i>
                <h3 class="area-title">Ver todas las donacionesEditar / Eliminar registros</h3>
              
                <button onclick="window.location.href='gestiondedonaciones.php'" class="area-button">Gestión de Donaciones</button>
            </div>

            <!-- Tarjeta 2 - Proyectos -->
            <div class="area-card">
                <i class="fas fa-tv fa-3x area-icon"></i>
                <h3 class="area-title">Crear, editar, eliminar campañas</h3>
              
                <button onclick="window.location.href='gestionpb.php'" class="area-button">Gestión de Proyectos y Bnefactor</button>
            </div>

            <!-- Tarjeta 3 - Usuarios -->
            <div class="area-card">
                <i class="fas fa-tools fa-3x area-icon"></i>
                <h3 class="area-title">Listado de usuariosAsignar roles</h3>
                <button class="area-button">Gestión de Usuarios</button>
            </div>

        </div>
    </div>
</section>

<section class="hero">
    <div class="hero-contenido">
        <h1 class="hero-titulo">"Solo el administrador puede acceder a estas páginas, protegido por sesiones y roles."</h1>

    </div>
</section>

<?php
include_once("modules/footer.html"); # Footer y cierre de HTML
?>
