<?php
/*************************************************************/
/* Archivo:  campanas.php
 * Objetivo: Pagina informativa a cerca de campanas activas en 
 * la institucion educativa para obtener recursos
 * Autor: Edwin Ariel Ramos Alvarez
 *************************************************************/
$customStyles = '<link rel="stylesheet" href="../view/css/vistas/campanas.css">'; #cargamos el estilo en especifico de campanas.php
include_once("modules/header.html");  # Incluye <head> y apertura de <body>
include_once("modules/navbar.php");   # Navbar
include_once("modules/hero.php"); // Incluye la función

// Define las variables para personalizar el hero
$tituloPagina = "!Transforma vidas, una campaña a la vez";
$subtituloPagina = "Explora las campañas activas para apoyar la educación de cientos de estudiantes del Tecnológico de Orizaba.
 Cada proyecto tiene un propósito y una meta concreta. ¡Sé parte del cambio!";
;

// Muestra el hero con los parámetros
mostrarHero($tituloPagina, $subtituloPagina, );
?>

<!-- Sección de campañas activas -->
<section class="seccion-camapañas-activas">
    <div class="campañas-contenedor">
        <!-- Primer campaña activa -->
        <div class="campañas-grid">
            <!-- Columna de Imagen -->
            <div class="camapñas-imagen">
                <img src="media/porque.jpg" alt="Estudiantes en laboratorio">
            </div>

            <!-- Columna de Texto -->
            <div class="campañas-content">
                <h2 class="campañas-titulo">Aula B-204 sin mobiliario adecuado</h2>
                <p class="campañas-texto">
                    Donec a eros justo. Fusce egestas tristique ultrices. Nam tempor, augue nec tincidunt molestie,
                    massa nunc varius arcu, at scelerisque elit erat a magna. Donec quis erat at libero ultrices mollis.
                    In hac habitasse platea dictumst. Vivamus vehicula leo dui, at porta nisi facilisis finibus. In
                    euismod augue vitae nisi ultricies, non aliquet urna tincidunt. Integer in nisi eget nulla commodo
                    faucibus efficitur quis massa. Praesent felis est, finibus et nisi ac, hendrerit venenatis libero.
                    Donec consectetur faucibus ipsum id gravida
                </p>
                <a href="#" class="campañas-boton">Quiero colaborar</a>
            </div>
        </div>

        <!-- Otra campaña activa -->
        <div class="campañas-grid">
            <!-- Columna de Imagen -->
            <div class="camapñas-imagen">
                <img src="media/porque.jpg" alt="Estudiantes en laboratorio">
            </div>

            <!-- Columna de Texto -->
            <div class="campañas-content">
                <h2 class="campañas-titulo">Aula B-204 sin mobiliario adecuado</h2>
                <p class="campañas-texto">
                    Donec a eros justo. Fusce egestas tristique ultrices. Nam tempor, augue nec tincidunt molestie,
                    massa nunc varius arcu, at scelerisque elit erat a magna. Donec quis erat at libero ultrices mollis.
                    In hac habitasse platea dictumst. Vivamus vehicula leo dui, at porta nisi facilisis finibus. In
                    euismod augue vitae nisi ultricies, non aliquet urna tincidunt. Integer in nisi eget nulla commodo
                    faucibus efficitur quis massa. Praesent felis est, finibus et nisi ac, hendrerit venenatis libero.
                    Donec consectetur faucibus ipsum id gravida
                </p>
                <a href="#" class="campañas-boton">Quiero colaborar</a>
            </div>
        </div>
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
            <a href="donar.html" class="iniciativa-boton">Ir al formulario de donacion</a>
            <a href="donar.html" class="iniciativa-boton">Registrarme para donar</a>
        </div>
    </div>
</section>

<?php
include_once("modules/footer.html"); # Footer y cierre de HTML
?>