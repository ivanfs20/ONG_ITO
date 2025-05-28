<?php
/*************************************************************/
/* Archivo:  transparencia.php
 * Objetivo: Pagina informativa, mas que nada para dar confianza a los usuarios y animarlos a donar,
 * dado que se pueden aclarar dudas, se proporcionan datos y se puede redireccionar a terminos  y 
 * condiciones o a contacto.
 * Autor: Edwin Ariel Ramos Alvarez
 *************************************************************/
$customStyles = '<link rel="stylesheet" href="../view/css/vistas/transparencia.css">'; #cargamos el estilo en especifico de transparencia.php
$customScript = '<script src="../view/js/script1.js"></script>'; #cargamos el script
include_once("modules/header.html");  # Incluye <head> y apertura de <body>
include_once("modules/navbar.php");   # Navbar
?>

<!-- Hero con imagen a la derecha -->
<section class="hero">
    <div class="hero-contenido">
        <h1 class="hero-titulo">
            Transparencia que<br><span class="resaltado">inspira confianza</span>
        </h1>
        <p class="hero-subtitulo">
            Cada peso donado cuenta... y tú mereces saber cómo se utiliza.<br>
            En el Tecnológico de Orizaba, nuestro compromiso es con la claridad, la ética y el impacto real.
        </p>
    </div>

    <div class="hero-imagen">
        <img src="media/porque.jpg" alt="Estudiantes en laboratorio">
    </div>
</section>


<!-- Seccion aclaraciones -->

<!-- #1-->
<section class="aclaracion-seccion">
    <div class="aclaracion-contenedor">
        <div class="dos-columna-aclaracion">
            <!-- Columna Izquierda -->
            <div class="texto-columna-aclaracion">
                <h2 class="titulo-principal-aclaracion">Cada donación es rastreada</h2>
                <p class="subtitulo-aclaracion">Toda contribución es asignada a una campaña o área específica
                    previamente publicada. No hay donaciones “a ciegas”.</p>
            </div>

            <!-- Columna Derecha -->
            <div class="columna-imagen">
                <!-- Imagen para enfatizar -->
                <img src="media/donacion-rastreada.jpg" alt="Estudiantes en laboratorio">
            </div>
        </div>
    </div>
</section>

<!-- #2-->
<section class="aclaracion-seccion">
    <div class="aclaracion-contenedor">
        <div class="dos-columna-aclaracion">
            <!-- Columna Izquierda -->
            <div class="texto-columna-aclaracion">
                <h2 class="titulo-principal-aclaracion">Documentamos cada paso</h2>
                <p class="subtitulo-aclaracion">Aunque aún no contamos con reportes descargables, los responsables del
                    proyecto mantienen registros internos y seguimiento para cada campaña.</p>
            </div>

            <!-- Columna Derecha -->
            <div class="columna-imagen">
                <!-- Imagen para enfatizar -->
                <img src="media/documentamos-pasos.jpg" alt="Estudiantes en laboratorio">
            </div>
        </div>
    </div>
</section>

<!-- #3-->
<section class="aclaracion-seccion">
    <div class="aclaracion-contenedor">
        <div class="dos-columna-aclaracion">
            <!-- Columna Izquierda -->
            <div class="texto-columna-aclaracion">
                <h2 class="titulo-principal-aclaracion"> Solo los administradores gestionan recursos</h2>
                <p class="subtitulo-aclaracion">El sistema está diseñado para que solo personal autorizado pueda mover,
                    registrar o cambiar datos de donaciones.</p>
            </div>

            <!-- Columna Derecha -->
            <div class="columna-imagen">
                <!-- Imagen para enfatizar -->
                <img src="media/administradores.jpg" alt="Estudiantes en laboratorio">
            </div>
        </div>
    </div>
</section>

<!-- #4-->
<section class="aclaracion-seccion">
    <div class="aclaracion-contenedor">
        <div class="dos-columna-aclaracion">
            <!-- Columna Izquierda -->
            <div class="texto-columna-aclaracion">
                <h2 class="titulo-principal-aclaracion">Los objetivos son claros</h2>
                <p class="subtitulo-aclaracion">Cada campaña publicada especifica el destino del recurso: mobiliario,
                    tecnología, becas u otra necesidad real y comprobada.</p>
            </div>

            <!-- Columna Derecha -->
            <div class="columna-imagen">
                <!-- Imagen para enfatizar -->
                <img src="media/objetivo.jpg" alt="Estudiantes en laboratorio">
            </div>
        </div>
    </div>
</section>

<!-- #Tipo hero antes de interrogante -->
<section class="tipo-hero">
    <div class="tipo-hero-contenido">
        <h1 class="tipo-hero-titulo">🧡Tu ayuda no se pierde. Se transforma.</h1>
        <p class="tipo-hero-subtitulo">Cuando donas al TEC de Orizaba, no solo contribuyes con dinero: aportas
            confianza, esperanza y progreso.
            Aunque hoy no contamos con dashboards o gráficas públicas, estamos trabajando para construir un sistema de
            rendición de cuentas más robusto, y tú eres parte fundamental de ese proceso</p>
    </div>
</section>

<!-- # Seccion pregunta -->
<section class="desicion-seccion">
    <div class="desicion-contenedor">
        <div class="desicion-content">
            <h2 class="desicion-titulo">¿Quieres saber el destino de tu donativo?</h2>
            <p class="desicion-subtitulo">Nuestro equipo está disponible para resolver tus dudas y brindarte
                tranquilidad.</p>
            <a href="terminosycondiciones.php" class="desicion-boton">Terminos y condiciones</a>
            <a href="contacto.php" class="desicion-boton">Contactanos</a>
        </div>
    </div>
</section>


<?php
include_once("modules/footer.html"); # Footer y cierre de HTML
?>