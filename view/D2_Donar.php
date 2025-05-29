<?php
/*************************************************************/
/* Archivo:  D2_Donar.php
 * Objetivo: Segunda fase para seguir el proceso de donacion, en este caso seleccionar el tipp de recurso
 * Autor: Edwin Ariel Ramos 
 *************************************************************/
$customStyles = '<link rel="stylesheet" href="../view/css/vistas/D2_Donar.css">'; #cargamos el estilo en especifico de D1_Area.php
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
        <h1 class="hero-titulo">No importa si es grande o pequeño, cada aparte suma para lograr un impacto positivo.
        </h1>
        <p class="hero-subtitulo">
            <span class="paso-inactivo">1</span>
            <span class="paso-activo">2</span>
            <span class="paso-inactivo">3</span>
            <span class="paso-inactivo">4</span>
        </p>
    </div>
</section>

<!-- Seccióm para elegit  el tipo de recurso con el cual se va a apoyar -->
<section class="seccion-donacion">
    <div class="contenedor-opciones">
        <h2 class="titulo-seccion">¿Qué deseas donar?</h2>
        <div class="contenedor-select">
            <select id="tipo-donacion" class="select-estilizado" required>
                <option value="" disabled selected>Selecciona una opción</option>
                <option value="dinero">Dinero - Aportación económica para apoyar las áreas</option>
                <option value="recurso">Recurso - Herramienta, material o equipo</option>
            </select>
            <span class="focus"></span>
        </div>
    </div>
</section>



<!-- Sección de continuación -->
<section class="seccion-continuar">
    <div class="contenedor-continuar">
        <div class="contenido-continuar">
            <p class="texto-guia">Selecciona el tipo de donación para continuar.</p>
            <button id="boton-continuar" class="boton-continuar2" disabled>
                CONTINUAR
            </button>
        </div>
    </div>
</section>


<?php
}{
    include_once("loginUrgente.php");
}
include_once("modules/footer.html"); # Footer y cierre de HTML
?>