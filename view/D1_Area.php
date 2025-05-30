<?php
/*************************************************************/
/* Archivo:  D1_Area.php
 * Objetivo: Da el comienzo para el proceso de donacion
 * Autor: Edwin Ariel Ramos 
 *************************************************************/
$customStyles = '<link rel="stylesheet" href="../view/css/vistas/D1_Area.css">'; #cargamos el estilo en especifico de D1_Area.php
$customScript = '<script src="../view/js/script1.js"></script>'; #cargamos el script
include_once("modules/header.html");  # Incluye <head> y apertura de <body>
//include_once("modules/navbar.php");   # Navbar
require_once '../model/Usuario.php';
session_start();
$bRes = false;
if (isset($_SESSION['usuario'])) {
    $oUsuario = $_SESSION["usuario"];
    $bRes = true;
    require_once '../navbar2.php';
} else {
    $oUsuario = null;
    $bRes = false;
    require_once 'modules/navbar.php';
}


if ($oUsuario != null) {
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
            <h2 class="section-title">¿A qué área deseas apoyar?</h2>
            <p class="section-subtitle">Selecciona un área para ver sus proyectos disponibles</p>

            <div class="area-selector">
                <select id="area-select" class="area-dropdown">
                    <option value="" disabled selected>Selecciona un área de apoyo</option>
                    <?php
                        include_once('../model/Proyecto.php');
                        $oProyecto = new Proyecto();
                        $arrProyectos = $oProyecto->readAll();
                        foreach($arrProyectos as $aoProyecto){
                    ?>
                    <option value="<?php echo $aoProyecto->getnIdProyecto();?>"><?php echo $aoProyecto->getsTitle();?></option>
                    <?php
                        }
                    ?>


                        


                </select>
                <div class="selector-icon">
                    <i class="fas fa-chevron-down"></i>
                </div>
            </div>


            
    </section>
        <div class="project-lists">
         <div id="beneficiarios-container" > </div></div>
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
} {
    if($bRes == false){
        include_once("loginUrgente.php");
    }
}
include_once("modules/footer.php"); # Footer y cierre de HTML
?>