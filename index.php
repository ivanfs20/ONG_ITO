<?php
/*************************************************************/
/* Archivo:  index.php
 * Objetivo: Pagina inicial para atraer/llamar la atencion de 
 *           los usuarios y insitarlos a donar
 * Autor: Edwin Ariel Ramos Alvarez
 *************************************************************/
$customStyles = '<link rel="stylesheet" href="view/css/vistas/landingpage.css">'; #cargamos el estilo en especifico de la landing page
$customScript = '<script src="../view/js/script1.js"></script>'; #cargamos el script
include_once("view/modules/header.html");  # Incluye <head> y apertura de <body>
include_once("navbar2.php");   # Navbar
include_once("view/modules/hero.php"); // Incluye la función

// Define las variables para personalizar el hero
$tituloPagina = "Ayuda a transformar el futuro de cientos de estudiantes del ITOrizaba";
$subtituloPagina = "Cada peso cuenta. Dona hoy y forma parte del cambio.";
$botonHero = [
    'texto' => "¡Quiero donar ahora!",
    'url' => "view/D1_Area.php"
];

// Muestra el hero con los parámetros
mostrarHero($tituloPagina, $subtituloPagina, $botonHero);
?>
<!-- Sección de Propósito -->
<section class="seccion-por-que">
    <div class="por-que-contenedor">
        <div class="por-que-grid">
            <!-- Columna de Imagen -->
            <div class="por-que-imagen">
                <img src="view/media/porque.jpg" alt="Estudiantes en laboratorio">
            </div>

            <!-- Columna de Texto -->
            <div class="por-que-content">
                <h2 class="seccion-titulo">¿Por qué hacemos esto?</h2>
                <p class="por-que-texto">
                    Actualmente, la gestión de donativos se hace manualmente. Esta plataforma busca profesionalizar
                    y hacer transparente el uso de cada donación.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Sección Áreas de Apoyo -->
<section class="areas-section">
    <div class="areas-container">
        <h2 class="section-title">Áreas de apoyo</h2>

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

<!-- Sección Tabla de evidencias -->
<section class="tabla-seccion">
    <div class="tabla-contenedor">
        <!-- Tabla de Evidencias de Material -->
        <div class="tabla-material">
            <div class="tabla-header">
                <h2 class="seccion-titulo">Evidencias de Material</h2>
                <p class="tabla-descripcion">Estado actual de los recursos materiales en nuestras instalaciones.</p>
            </div>

            <div class="evidencia-tabla material">
                <!-- Fila 1 -->
                <div class="tabla-fila">
                    <div class="celda-imagen">
                        <img src="view/media/salon.jpg" alt="Salón sin proyector">
                    </div>
                    <div class="descripcion-celda">
                        <p class="descripcion-texto">Este salón carece de proyector y pizarrón adecuados.</p>
                    </div>
                </div>

                <!-- Fila 2 -->
                <div class="tabla-fila">
                    <div class="celda-imagen">
                        <img src="view/media/pupitres.jpg" alt="Pupitres deteriorados">
                    </div>
                    <div class="descripcion-celda">
                        <p class="descripcion-texto">Pupitres deteriorados que afectan la comodidad estudiantil.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabla de Evidencias de Donación -->
        <div class="tabla-donacion">
            <div class="tabla-header">
                <h2 class="seccion-titulo">Evidencias de Donación</h2>
                <p class="tabla-descripcion">Registro de contribuciones y su impacto en nuestra institución.</p>
            </div>

            <div class="evidencia-tabla donacion">
                <table class="tabla-datos">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Monto</th>
                            <th>Folio</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php require_once 'controller/digitalIndexController.php'; ?>
                    </tbody>
                </table>
            </div>
        </div>


    </div>
</section>


<!-- Sección situacion conmovedora -->

<section class="estadisticas-seccion">
    <div class="estadisticas-contenedor">
        <div class="dos-columna-layout">
            <!-- Columna Izquierda -->
            <div class="texto-columna">
                <h2 class="titulo-principal">Situación de los alumnos del Tecnológico de Orizaba</h2>
                <p class="subtitulo">Más allá de la matrícula, hay historias que necesitan tu apoyo.</p>
            </div>

            <!-- Columna Derecha -->
            <div class="columna-estadisticas">
                <!-- Item 1 -->
                <div class="estadisticas-item">
                    <div class="estadisticas-icono">📚</div>
                    <div class="stat-content">
                        <span class="estadisticas-numero">1 de cada 3</span>
                        <p class="estadisticas-descripccion">aulas no cuenta con mobiliario adecuado.</p>
                    </div>
                </div>

                <!-- Item 2 -->
                <div class="estadisticas-item">
                    <div class="estadisticas-icono">💻</div>
                    <div class="stat-content">
                        <span class="estadisticas-numero">El 60%</span>
                        <p class="estadisticas-descripccion">de los equipos en laboratorios ya no funcionan.</p>
                    </div>
                </div>

                <!-- Item 3 -->
                <div class="estadisticas-item">
                    <div class="estadisticas-icono">🎓</div>
                    <div class="stat-content">
                        <span class="estadisticas-numero">Casi el 40%</span>
                        <p class="estadisticas-descripccion">de los estudiantes ha pensado en abandonar sus estudios.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Sección de Colaboración -->
<section class="colaboracion-seccion">
    <div class="colaboracion-contenedor">
        <div class="collab-content">
            <h2 class="colaboracion-titulo">Colabora con donativos</h2>
            <p class="colaboracion-subtitulo">ITOrizaba, ayudar es crecer<br>y crecer es vivir.</p>
            <a href="view/D1_Area.php" class="colaboracion-boton">Quiero colaborar</a>
        </div>
    </div>
</section>

<?php
include_once("footer2.html"); # Footer y cierre de HTML
?>