<?php
/*************************************************************/
/* Archivo:  D1_Area.php
 * Objetivo: Da el comienzo para el proceso de donacion
 * Autor: Edwin Ariel Ramos 
 *************************************************************/
$customStyles = '<link rel="stylesheet" href="../view/css/vistas/D1_Area.css">'; #cargamos el estilo en especifico de D1_Area.php
$customScript = '<script src="../view/js/script1.js"></script>'; #cargamos el script
include_once("modules/header.html");  # Incluye <head> y apertura de <body>
include_once("modules/navbar.php");   # Navbar
require_once '../model/Usuario.php';
session_start();

if (isset($_SESSION['usuario'])) {
    $oUsuario = $_SESSION["usuario"];
} else {
    $oUsuario = null;
}


if($oUsuario!=null){
?>


<!-- #Seccion tipo Hero que actua como menu para seguir los pasos -->
<section class="hero">
    <div class="hero-contenido">
        <h1 class="hero-titulo">Cada herramienta, cada recurso, puede construir un futuro mejor. ¿Dónde quieres dejar tu
            huella?</h1>
        <p class="hero-subtitulo">
            <span class="paso-activo">1</span>
            <span class="paso-inactivo">2</span>
            <span class="paso-inactivo">3</span>
            <span class="paso-inactivo">4</span>
        </p>
    </div>
</section>


<!-- Sección Áreas de Apoyo -->
<section class="areas-section">
    <div class="areas-container">
        <h2 class="section-title">¿A qué área deseas apoyar? </h2>
        <h2 class="section-subtitle">Selecciona una de las siguientes opciones:</h2>
        <div class="areas-grid">
            <!-- Tarjeta 1 - Biblioteca -->
            <div class="area-card">
                <i class="fas fa-book-open fa-3x area-icon"></i>
                <h3 class="area-title">Biblioteca</h3>
                <p class="area-description">Nuestra biblioteca es el corazón académico. Tu donativo ayuda a renovar,
                    actualizar equipos de consulta y mejorar espacios para el estudio colaborativo.</p>
                <button class="area-button">Quiero apoyar esta área</button>
            </div>

            <!-- Tarjeta 2 - Aulas inteligentes -->
            <div class="area-card">
                <i class="fas fa-tv fa-3x area-icon"></i>
                <h3 class="area-title">Aulas inteligentes</h3>
                <p class="area-description">Transformación de aulas en espacios tecnológicos con pantallas
                    digitales, proyectores y conectividad, brindando mejores herramientas educativas.</p>
                <button class="area-button">Quiero apoyar esta área</button>
            </div>

            <!-- Tarjeta 3 - Mantenimiento -->
            <div class="area-card">
                <i class="fas fa-tools fa-3x area-icon"></i>
                <h3 class="area-title">Mantenimiento</h3>
                <p class="area-description">Mantén un campus limpio, seguro y funcional. Tu apoyo ayuda a conservar
                    las instalaciones y servicios básicos en óptimas condiciones.</p>
                <button class="area-button">Quiero apoyar esta área</button>
            </div>

            <!-- Tarjeta 4 - Laboratorios -->
            <div class="area-card">
                <i class="fas fa-flask fa-3x area-icon"></i>
                <h3 class="area-title">Laboratorios</h3>
                <p class="area-description">Equipamos laboratorios con herramientas modernas que impulsan la
                    investigación, creatividad e innovación de nuestros estudiantes en la institucion.</p>
                <button class="area-button">Quiero apoyar esta área</button>
            </div>
        </div>
    </div>
</section>

<!-- Sección de continuación -->
<section class="seccion-continuar">
    <div class="contenedor-continuar">
        <div class="contenido-continuar">
            <p class="texto-guia">Después de elegir, continúa para seleccionar el tipo de donación.</p>
            <button class="boton-continuar" disabled>
                CONTINUAR
            </button>
        </div>
    </div>
</section>

<?php
include_once("modules/footer.html"); # Footer y cierre de HTML
}
?>