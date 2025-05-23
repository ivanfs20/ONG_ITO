<?php
/*************************************************************/
/* Archivo:  D41_ConfirmarTarjeta.php
 * Objetivo: Segunda fase para seguir el proceso de donacion, en este caso seleccionar el tipp de recurso
 * Autor: Edwin Ariel Ramos 
 *************************************************************/
$customStyles = '<link rel="stylesheet" href="../view/css/vistas/D41_ConfirmarTarjeta.css">'; #cargamos el estilo en especifico de D41_ConfirmarTarjeta.php
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


<div class="contenedor-select">
    <select id="tipo-donacion" class="select-estilizado" required>
        <option value="" disabled>Selecciona una opción</option>
        <option value="dinero" selected>Dinero (Aportación económica para apoyar las áreas)</option>
    </select>
</div>

<!-- Seccion para formulariio -->
<div class="contenedor-formularios">
    <!-- Formulario para dinero -->
    <form id="formulario-dinero" class="formulario-donacion">
        <div class="grupo-formulario">
            <label for="id-donador">Identificacion de la donacion</label>
            <input name="id-donacion" type="text" id="id-donador" required>
        </div>

        <div class="grupo-formulario">
            <label for="nombre-donador">Nombre Donador</label>
            <input name="nombre-del-donador" type="text" id="nombre-donador" required>
        </div>

        <div class="grupo-formulario">
            <label for="monto">Monto</label>
            <input name="monto-total" type="number" id="monto" required>
        </div>

        <div class="grupo-formulario">
            <label for="fecha">Fecha</label>
            <input name="fecha-donacion" type="date" id="fecha" required>
        </div>

        <div class="grupo-formulario">
            <label for="estado">Estado donacion</label>
            <input name="estado-donacion" type="text" id="estado" required>
        </div>
    </form>
</div>


<!-- seccion de botones, para confirmar-->
<section class="confirmacion-donacion">
    <div class="contenedor-confirmacion">
        <div class="tarjeta-confirmacion">
            <h2 class="texto-confirmacion">¿Confirmas tu donación?</h2>

            <div class="controles-confirmacion">
                <a href="agradecimiento.php" class="boton-accion confirmar">
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
}
?>