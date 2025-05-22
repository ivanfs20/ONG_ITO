<?php
/*************************************************************/
/* Archivo:  error.php
 * Objetivo: Pagina para agradecer la donacion hecha
 * Autor: Edwin Ariel Ramos 
 *************************************************************/
$customStyles = '<link rel="stylesheet" href="../view/css/vistas/agradecimiento.css">'; #cargamos el estilo en especifico de agradecimiento.php
$customScript = '<script src="../view/js/script1.js"></script>'; #cargamos el script
include_once("modules/header.html");  # Incluye <head> y apertura de <body>
include_once("modules/navbar.php");   # Navbar
?>

<!-- #hero section de agradecimiento-->
<section class="hero">
    <div class="hero-contenido">
        <h1 class="hero-titulo">¡Gracias por ser parte del cambio!</h1>
        <p class="hero-subtitulo">Tu apoyo construye sueños, impulsa futuros y deja una huella imborrable.</p>
        <!-- #Boton para descargar el folio -->
        <div class="boton-hero">
            <button class="boton-descargar-folio">Descargar folio</button>
        </div>
    </div>
</section>

<!-- seccion de agradecimientos futuros -->
<section class="seccion-agradecimiento">
    <div class="agradecimiento-contenedor">

        <!-- Primer campaña activa y de ejemplo para los back-ends-->
        <div class="agradecimiento-grid">
            <!-- Columna de Imagen -->
            <div class="agradecimiento-imagen">
                <img src="media/agradecimiento.jpg" alt="Estudiantes en laboratorio">
            </div>

            <!-- Columna de Texto -->
            <div class="agradecimiento-content">
                <h2 class="agradecimiento-titulo">🎉 ¡Gracias por tu futura donación!</h2>
                <p class="agradecimiento-texto">
                    Tu apoyo es muy valioso y marcará la diferencia en nuestra comunidad. Pronto nos pondremos en
                    contacto contigo si es necesario.

                    ¿Quieres ver cómo tu ayuda se está utilizando? Haz clic en el siguiente botón para ver fotos, videos
                    o informes de las mejoras realizadas gracias a personas como tú: </p>

                <a href="../index.php" class="agradecimiento-boton">Ver evidencias de donaciones</a>
            </div>
        </div>

    </div>
</section>

<?php
include_once("modules/footer.html"); # Footer y cierre de HTML
?>