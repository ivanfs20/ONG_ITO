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
$bRes = false;
if (isset($_SESSION['usuario'])) {
    $oUsuario = $_SESSION["usuario"];
    $bRes = true;
} else {
    $oUsuario = null;
    $bRes = false;
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


            <?php
                include_once("../model/Proyecto.php");
                $oProyecto = new Proyecto();
                $arrProyecto = $oProyecto->readAll();
            ?>

            <div class="area-selector">
                <select id="area-select" class="area-dropdown">
                <option value="" disabled selected>Selecciona un Proyecto</option>
                    <?php
                        foreach($arrProyecto as $oProyect){
                    ?>
                        <option value='"<?php echo $oProyect->getnIdProyecto();?>"'><?php echo $oProyect->getsTitle();?></option>
                    <?php
                        }
                    ?>

                </select>
                <div class="selector-icon">
                    <i class="fas fa-chevron-down"></i>
                </div>
            </div>

            <!-- Biblioteca -->
            <div id="biblioteca" class="projects-container">
                <div class="area-header">
                    <h3>Biblioteca</h3>
                    <p>Proyectos para mejorar nuestra biblioteca y recursos de estudio</p>
                </div>

                <div class="projects-list">
                    <div class="project-item">
                        <h3 class="project-title">Actualización de Colección Literaria</h3>
                        <p class="project-description">Adquisición de nuevos títulos de literatura contemporánea para
                            enriquecer nuestra impetú cultural.</p>
                        <button class="project-button" data-proyecto="Proyecto Solar">
                            Donar
                        </button>
                    </div>

                    <div class="project-item">
                        <h3 class="project-title">Area para Descansar</h3>
                        <p class="project-description">Implementación de estaciones de descanso con colchonetas xd y acceso
                            a cojines.</p>
                        <button class="project-button" data-proyecto="Proyecto Solar">
                            Donar
                        </button>
                    </div>
                </div>
            </div>

            <!-- Aulas inteligentes -->
            <div id="aulas" class="projects-container">
                <div class="area-header">
                    <h3>Aulas Inteligentes</h3>
                    <p>Proyectos para modernizar nuestras aulas con tecnología educativa</p>
                </div>

                <div class="projects-list">
                    <div class="project-item">
                        <h3 class="project-title">Modernización Aula Magna</h3>
                        <p class="project-description">Equipamiento del aula magna con sistema de proyección y sonido
                            para eventos académicos.</p>
                        <button class="project-button" data-proyecto="Proyecto Solar">
                            Donar
                        </button>
                    </div>

                    <div class="project-item">
                        <h3 class="project-title">Conectividad en Aulas</h3>
                        <p class="project-description">Instalación de puntos de acceso WiFi en todas las aulas para
                            aprendizaje interactivo.</p>
                        <button class="project-button" data-proyecto="Proyecto Solar">
                            Donar
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mantenimiento -->
            <div id="mantenimiento" class="projects-container">
                <div class="area-header">
                    <h3>Mantenimiento</h3>
                    <p>Proyectos para mantener nuestro campus en óptimas condiciones</p>
                </div>

                <div class="projects-list">
                    <div class="project-item">
                        <h3 class="project-title">Renovación de Baños</h3>
                        <p class="project-description">Remodelación completa de los baños de estudiantes con divisiones
                            adecuadas.</p>
                        <button class="project-button" data-proyecto="Proyecto Solar">
                            Donar
                        </button>
                    </div>

                    <div class="project-item">
                        <h3 class="project-title">Áreas Verdes y Jardines</h3>
                        <p class="project-description">Rehabilitación de áreas verdes con nuevo sistema de riego y
                            mobiliario.</p>
                        <button class="project-button" data-proyecto="Proyecto Solar">
                            Donar
                        </button>
                    </div>
                </div>
            </div>

            <!-- Laboratorios -->
            <div id="laboratorios" class="projects-container">
                <div class="area-header">
                    <h3>Laboratorios</h3>
                    <p>Proyectos para equipar nuestros laboratorios con herramientas modernas</p>
                </div>

                <div class="projects-list">
                    <div class="project-item">
                        <h3 class="project-title">Laboratorio de Quimica
                        </h3>
                        <p class="project-description">Creación de laboratorio equipado para análisis de cerveza como el
                            quique.</p>
                        <button class="project-button" data-proyecto="Proyecto Solar">
                            Donar
                        </button>
                    </div>

                    <div class="project-item">
                        <h3 class="project-title">Laboratorio de Computo</h3>
                        <p class="project-description">Equipamiento de espacio para materias que necesiten full practica.
                        </p>
                        <button class="project-button" data-proyecto="Proyecto Solar">
                            Donar
                        </button>
                    </div>
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
} {
    if($bRes == false){
        include_once("loginUrgente.php");
    }
}
include_once("modules/footer.php"); # Footer y cierre de HTML
?>