<?php
/*************************************************************/
/* Archivo:  login.php
 * Objetivo: EL unico objetivo es para iniciar sesion o registrarse
 * Autor: Edwin Ariel Ramos Alvarez
 *************************************************************/
$customStyles = '<link rel="stylesheet" href="../view/css/vistas/iniciarsesion.css">'; #cargamos el estilo en especifico de iniciarsesion.php
$customScript = '<script src="../view/js/script1.js"></script>'; #cargamos el script
include_once("modules/header.html");  # Incluye <head> y apertura de <body>
include_once("modules/navbar.php");   # Navbar
require_once '../model/Usuario.php';

//Destruimos la sessión si es que el usuario en la barra del navegador quiere ir al login (estaria saliendo automaticamente)
//de la sessión
session_start();
session_unset();
session_destroy();
?>

<!-- Hero con letras amarillas atractivas -->
<section class="hero">
    <div class="hero-contenido">
        <h1 class="hero-titulo">Sé parte del cambio, empieza con un pequeño paso.</h1>
        <p class="hero-subtitulo">¡Únete y transforma vidas!</p>
    </div>
</section>


<!-- Seccion del login -->
<div class="contenedor-login">
    <div class="selector-formularios">
        <button class="selector-opcion activo" data-formulario="registro">Registrarse</button>
        <button class="selector-opcion" data-formulario="login">Iniciar Sesión</button>
    </div>

    <div class="formularios">
        <!-- Formulario de Registro -->
        <form id="form-registro" class="formulario formulario-activo" action="../controller/register.php" method="POST">
            <p>¡Bienvenido!</p>
            <p> Si ya tienes una cuenta, inicia sesión con tu correo electrónico y contraseña.</p>
            <div class="grupo-input">
                <label for="nombre">Nombre completo</label>
                <input name="full-name" type="text" id="nombre" required>
            </div>
            <div class="grupo-input">
                <label for="email">Correo electrónico</label>
                <input name="e-mail" type="email" id="email" required>
            </div>
            <div class="grupo-input">
                <label for="rfc">Ingrese su RFC</label>
                <input name="RFC" type="text" id="rfc" required>
            </div>
            <div class="grupo-input">
                <label for="domicilio-usuario">Domicilio</label>
                <input name="domicilio" type="text" id="domicilio" required>
            </div>
            <div class="grupo-input">
                <label for="password">Contraseña</label>
                <input name="contraseña" type="password" id="password" required>
            </div>
            <div class="grupo-input">
                <label for="confirmar-password">Confirmar contraseña</label>
                <input name="confirmar-contraseña" type="password" id="confirmar-password" required>
                <p> Una vez registrado podras realizar tu donacion </p>
            </div>
            <button type="submit" class="boton-primario">Crear cuenta</button>
        </form>

        <!-- Formulario de Login -->
        <form id="form-login" class="formulario" action="../controller/login.php" method="POST">
            <div class="grupo-input">
                <label for="email-login">Correo electrónico</label>
                <input name="email-registrado" type="email" id="email-login" required>
            </div>
            <div class="grupo-input">
                <label for="password-login">Contraseña</label>
                <input name="contraseña-registrada" type="password" id="password-login" required>
            </div>
            <button type="submit" class="boton-primario">Ingresar</button>
            <p class="enlace-alternativo">¿No tienes cuenta? <a href="#" class="cambiar-formulario"
                    data-formulario="registro">Regístrate aquí</a></p>
        </form>
    </div>
</div>

<?php
include_once("modules/footer.php"); # Footer y cierre de HTML
?>