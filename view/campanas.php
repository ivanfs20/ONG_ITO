<?php
/*************************************************************/
/* Archivo:  campanas.php
 * Objetivo: Pagina informativa a cerca de campanas activas en 
 * la institucion educativa para obtener recursos
 * Autor: Edwin Ariel Ramos Alvarez
 *************************************************************/
$customStyles = '<link rel="stylesheet" href="../view/css/vistas/campanas.css">'; #cargamos el estilo en especifico de campanas.php
$customScript = '<script src="../view/js/script1.js"></script>'; #cargamos el script
include_once("modules/header.html");  # Incluye <head> y apertura de <body>
//include_once("modules/navbar.php");   # Navbar
include_once("modules/hero.php"); // Incluye la función
require_once '../model/Usuario.php';
session_start();


if (isset($_SESSION['usuario'])) {
    require_once '../navbar2.php';
} else {
    
    require_once 'modules/navbar.php';
}

// Define las variables para personalizar el hero
$tituloPagina = "!Transforma vidas, una campaña a la vez";
$subtituloPagina = "Explora las campañas activas para apoyar la educación de cientos de estudiantes del Tecnológico de Orizaba.
 Cada proyecto tiene un propósito y una meta concreta. ¡Sé parte del cambio!";
;

// Muestra el hero con los parámetros
mostrarHero($tituloPagina, $subtituloPagina );
?>
<!-- Sección de campañas activas -->
<section class="campanas-section">
    <div class="container">
        <h2 class="title-campanas">Campañas activas</h2>

        <div class="carrusel-contenedor">
            <div class="carrusel-pista">


            <?php
            include_once("../model/Proyecto.php");
            $oProyecto = new Proyecto();
            $arrProyectos = $oProyecto->readAll();
            foreach ($arrProyectos as $arrP) {

                $imagenBinaria = $arrP->getaPhoto();
                $base64Image = base64_encode($imagenBinaria);
                $imgSrc = 'data:image/jpeg;base64,' . $base64Image;
                ?>

                <!-- Slide 1 -->
                <div class="carrusel-slide">
                    <div class="c-card c-card--solid c-card--highlight">
                        <a href="D1_Area.php" class="c-card__link causaitem" title="El Mejor Trato">
                        <img src="<?php echo $imgSrc; ?>" alt="Imagen del proyecto" width="100%" />                        </a>
                        <div class="c-card__body">
                            <a href="D1_Area.php" class="c-card__link causaitem" title="El Mejor Trato">
                                <h3 class="c-card__titulo"><?php echo $arrP->getsTitle(); ?></h3>
                                <p class="c-card__texto">
                                <?php echo $arrP->getsDescription(); ?>
                                </p>
                            </a>
                            <a href="D1_Area.php" class="c-btn">Donar</a>
                        </div>
                    </div>
                </div>

    <?php
            }
    ?>







            </div>
            <!-- Controles del carrusel -->
            <div class="controls-container">
                <button class="carrusel-btn" id="prevBtn" aria-label="Anterior">‹</button>
                <button class="carrusel-btn" id="nextBtn" aria-label="Siguiente">›</button>
            </div>

            <!-- Indicadores de posición -->
            <div class="indicadores" id="indicadores"></div>
        </div>
</section>


<!-- Sección testimonios de impacto -->
<section class="testimonios-impacto">
    <div class="testimonios-contenedor">
        <h2 class="testimonios-titulo">Testimonios de impacto</h2>

        <!-- Testimonio 1 -->
        <p class="testimonio-frase">“Gracias a las donaciones, ahora podemos aprender en un espacio digno y con
            proyector. Estudiar ya no es una lucha diaria.”</p>
        <p class="testimonio-persona">-Carlos Hernandez</p>
        <small>Estudiante de Ing.Electronica</small>

        <!-- Testimonio 2 -->
        <p class="testimonio-frase">“Gracias a las donaciones, ahora podemos aprender en un espacio digno y con
            proyector. Estudiar ya no es una lucha diaria.”</p>
        <p class="testimonio-persona">-Carlos Hernandez</p>
        <small>Estudiante de Ing.Electronica</small>

        <!-- Testimonio 3 -->
        <p class="testimonio-frase">“Gracias a las donaciones, ahora podemos aprender en un espacio digno y con
            proyector. Estudiar ya no es una lucha diaria.”</p>
        <p class="testimonio-persona">-Carlos Hernandez</p>
        <small>Estudiante de Ing.Electronica</small>
    </div>
</section>


<!-- Sección por que donar -->
<section class="razon-seccion">
    <div class="razon-contenedor">
        <div class="dos-columna-layout">
            <!-- Columna Izquierda -->
            <div class="razon-columna">
                <h2 class="razon-titulo">¿Por qué donar?</h2>
                <p class="razon-subtitulo">Si aun no estás convencido, encuentra más razones para ayudar a la
                    institución.</p>
            </div>

            <!-- Columna Derecha -->
            <div class="columna-razon">
                <!-- Item 1 -->
                <div class="razon-item">
                    <div class="razon-icono">📚</div>
                    <div class="razon-content">
                        <p class="razon-descripcion">Educación de calidad</p>
                    </div>
                </div>

                <!-- Item 2 -->
                <div class="razon-item">
                    <div class="razon-icono">💻</div>
                    <div class="razon-content">
                        <p class="razon-descripcion">Apoyo directo a estudiantes</p>
                    </div>
                </div>

                <!-- Item 3 -->
                <div class="razon-item">
                    <div class="razon-icono">🎓</div>
                    <div class="razon-content">
                        <p class="razon-descripcion">Transparencia garantizada</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Sección de iniciativa -->
<section class="iniciativa-seccion">
    <div class="iniciativa-contenedor">
        <div class="iniciativa-content">
            <h2 class="iniciativa-titulo">¿Ya elegiste una causa que te inspire?</h2>
            <p class="iniciativa-subtitulo">Da clic en el botón de la campaña que más te mueva y haz tu donativo en
                minutos.</p>
            <a href="D1_Area.php" class="iniciativa-boton">Ir al formulario de donacion</a>
            <a href="iniciarsesion.php" class="iniciativa-boton">Registrarme para donar</a>
        </div>
    </div>
</section>

<?php
include_once("modules/footer.php"); # Footer y cierre de HTML
?>