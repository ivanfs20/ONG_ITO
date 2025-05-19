<?php
/*************************************************************/
/* Archivo:  D4_Confirmacion.php
 * Objetivo: Segunda fase para seguir el proceso de donacion, en este caso seleccionar el tipp de recurso
 * Autor: Edwin Ariel Ramos 
 *************************************************************/
$customStyles = '<link rel="stylesheet" href="../view/css/vistas/D4_Confirmacion.css">'; #cargamos el estilo en especifico de D1_Area.php
$customScript = '<script src="../view/js/script1.js"></script>'; #cargamos el script
include_once("modules/header.html");  # Incluye <head> y apertura de <body>
include_once("modules/navbar.php");   # Navbar
?>

<!-- #Seccion tipo Hero que actua como menu para seguir los pasos -->
<section class="hero">
    <div class="hero-contenido">
        <h1 class="hero-titulo">¡Estás a punto de hacer una diferencia real! Solo un clic más para compartir tu ayuda.
        </h1>
        <p class="hero-subtitulo">
            <span class="paso-inactivo">1</span>
            <span class="paso-inactivo">2</span>
            <span class="paso-inactivo">3</span>
            <span class="paso-activo">4</span>
        </p>
    </div>
</section>


<!-- seccion de botones, para confirmar-->
<section class="confirmacion-donacion">
    <div class="contenedor-confirmacion">
        <div class="tarjeta-confirmacion">
            <h2 class="texto-confirmacion">¿Confirmas tu donación?</h2>

            <div class="controles-confirmacion">
                <a href="procesar_donacion.php" class="boton-accion confirmar">
                    Confirmar Donación
                </a>
                <a href="cancelacion.php" class="boton-accion cancelar">
                    Cancelar
                </a>
            </div>
        </div>
    </div>
</section>

<?php
include_once("modules/footer.html"); # Footer y cierre de HTML
?>