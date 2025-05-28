<?php
/*************************************************************/
/* Archivo:  areasapoyo.php
 * Objetivo: Pagina donde se muestra informacion alusiva acerca de
 * las areas de apoyo y se puede redirigir a campañas activas
 * Autor: Edwin Ariel Ramos Alvarez
 *************************************************************/
$customStyles = '<link rel="stylesheet" href="../view/css/vistas/areasapoyo.css">'; #cargamos el estilo en especifico de areasapoyo.php
$customScript = '<script src="../view/js/script1.js"></script>'; #cargamos el script
include_once("modules/header.html");  # Incluye <head> y apertura de <body>
include_once("modules/navbar.php");   # Navbar
include_once("modules/hero.php"); // Incluye la función

// Define las variables para personalizar el hero
$tituloPagina = "Elige el area que mas te inspire transformar";
$subtituloPagina = "Cada rincón del Tecnológico de Orizaba tiene una historia que mejorar. 
Descubre cómo puedes hacer la diferencia apoyando aulas, laboratorios, becas y más.";
;

// Muestra el hero con los parámetros
mostrarHero($tituloPagina, $subtituloPagina, );
?>

<!-- Area apoyo -->

<section class="apoyo-seccion">
    <div class="apoyo-contenedor">
        <div class="dos-columna-apoyo">
            <!-- Columna Izquierda -->
            <div class="texto-columna-apoyo">
                <h2 class="titulo-principal-apoyo">Ayuda a nuestra comunidad, son muchos buhos que necesitan tu
                    colaboracion</h2>
                <p class="subtitulo-apoyo">Esperemos que esto te inspire a tomar una desicion.</p>
            </div>

            <?php
                include_once("../model/Proyecto.php");
                include_once("../model/Beneficiario.php");
                $oProyecto = new Proyecto();
                $oBenefactor = new Beneficiario();

                $nAmountProyectos = count($oProyecto->readAll());
                $nAmountBenefactores = count($oBenefactor->getAll());
            ?>

            <!-- Columna Derecha -->
            <div class="columna-apoyos">
                <!-- Ítems corregidos -->
                <div class="apoyo-item">
                    <div class="apoyo-icono">📚</div>
                    <div class="stat-content">
                        <span class="apoyo-numero">+ 5341</span>
                        <p class="apoyo-descripcion">estudiantes.</p>
                    </div>
                </div>

                <!-- Item 2 -->
                <div class="apoyo-item">
                    <div class="apoyo-icono">💻</div>
                    <div class="stat-content">
                        <span class="apoyo-numero">267</span>
                        <p class="apoyo-descripcion">aulas.</p>
                    </div>
                </div>

                <!-- Item 3 -->
                <div class="apoyo-item">
                    <div class="apoyo-icono">🎓</div>
                    <div class="stat-content">
                        <span class="apoyo-numero"><?php echo $nAmountProyectos;?></span>
                        <p class="apoyo-descripcion">proyectos.
                        </p>
                    </div>
                </div>

                <!-- Item 4 -->
                <div class="apoyo-item">
                    <div class="apoyo-icono">🎓</div>
                    <div class="stat-content">
                        <span class="apoyo-numero"><?php echo $nAmountBenefactores;?></span>
                        <p class="apoyo-descripcion">beneficiarios.
                        </p>
                    </div>
                </div>

                            <?php
            
            ?>
            </div>
        </div>
    </div>
</section>

<!-- Seccion areas de apoyo -->
<section class="seccion-areas-apoyo">
    <div class="areas-contenedor">

    <?php
    include("../controller/benefactoresController.php");
    ?>
    </div>
</section>

<!-- Bloque emocional para enfatizar con los usuarios y darles lastima -->
<section class="interrogante-seccion">
    <div class="interrogante-contenedor">
        <div class="dos-columna-interrogante">
            <!-- Columna Izquierda -->
            <div class="texto-columna-interrogante">
                <h2 class="titulo-principal-interrogante">Imagina estudiar en un aula sin sillas, o no poder hacer tus
                    prácticas por falta de equipo.</h2>
                <p class="subtitulo-interrogante">Cada donativo es un paso más para crear condiciones que los
                    estudiantes merecen.</p>
            </div>

            <!-- Columna Derecha -->
            <div class="columna-imagen">
                <!-- Imagen para enfatizar -->
                <img src="media/porque.jpg" alt="Estudiantes en laboratorio">
            </div>
        </div>
    </div>
</section>

<!-- Mini testimonios que complementan -->
<section class="mini-testimonios-impacto">
    <div class="mini-testimonios-contenedor">
        <h2 class="mini-testimonios-titulo">Testimonios de impacto</h2>

        <!-- Testimonio 1 -->
        <p class="mini-testimonio-frase">“La beca que recibí me permitió terminar mi carrera. Hoy soy el primero de mi
            familia en lograrlo.”</p>
        <p class="mini-testimonio-persona">-Sofia Camacho</p>
        <small>Estudiante de Ing.Electronica</small>

        <!-- Testimonio 2 -->
        <p class="mini-testimonio-frase">“Gracias a las donaciones, ahora puedo tomar mis practicas en tiempo y forma en
            los laboratorios.”</p>
        <p class="mini-testimonio-persona">-Saul Hernandez</p>
        <small>Estudiante de Ing.Electronica</small>

    </div>
</section>


<!-- Sección desicion -->
<section class="desicion-seccion">
    <div class="desicion-contenedor">
        <div class="desicion-content">
            <h2 class="desicion-titulo">¿Ya sabes a que area quieres apoyar?</h2>
            <p class="desicion-subtitulo">Da clic y elige la campaña que te mueva. Ayudar nunca fue tan fácil.</p>
            <a href="iniciarsesion.php" class="desicion-boton">Dona directamente a un area</a>
            <a href="campanas.php" class="desicion-boton">Explora campañas activas</a>
        </div>
    </div>
</section>

<?php
include_once("modules/footer.html"); # Footer y cierre de HTML
?>