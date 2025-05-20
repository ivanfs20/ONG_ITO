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

<!-- Seleccionar el tipo de donacion -->
<div class="contenedor-select">
    <select id="tipo-donacion" class="select-estilizado" required>
        <option value="" disabled selected>Selecciona una opción</option>
        <option value="dinero">Dinero (Aportación económica para apoyar las áreas)</option>
        <option value="recurso">Recurso (Herramienta, material o equipo)</option>
    </select>
</div>


<!-- Seccion para formularios -->

<div class="contenedor-formularios">
    <!-- Formulario para dinero -->
    <form id="formulario-dinero" class="formulario-donacion">
        <div class="grupo-formulario">
            <label for="id-donador">Identificacion de la donacion</label>
            <input name="id-donacion" type="text" id="nombre-donador" required>
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

    <!-- Formulario para recurso -->
    <form id="formulario-recurso" class="formulario-donacion">
        <div class="grupo-formulario">
            <label for="nombre-recurso">Nombre del recurso</label>
            <input name="nombre-recurso" type="text" id="nombre-recurso" placeholder="Ejemplo: Silla ergonómica, Multímetro digital" required>
        </div>

        <div class="grupo-formulario">
            <label for="descripcion">Descripción del recurso</label>
            <textarea name="descripcion-recurso" id="descripcion" required></textarea>
        </div>

        <div class="grupo-formulario">
            <label for="estado-recurso">Estado del recurso</label>
            <select id="estado-recurso" required>
                <option name="nuevo" value="nuevo">Nuevo</option>
                <option name="seminuevo" value="seminuevo">Seminuevo</option>
                <option name="usado" value="usado">Usado</option>
            </select>
        </div>

        <div class="grupo-formulario">
            <label>Imagen del recurso (opcional)</label>
            <div class="subida-archivo">
                <input name="imagen-recurso" type="file" id="imagen-recurso" accept="image/*">
                <span>Haz clic para subir una imagen</span>
            </div>
        </div>

    </form>
</div>


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