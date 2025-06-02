<?php
/*************************************************************/
/* Archivo:  gestiondedonaciones.php
 * Objetivo: Menu de los tipos de donaciones
 * Autor: Uriel Vallejo Xicalhua
 *************************************************************/
$customStyles = '<link rel="stylesheet" href="../view/css/vistas/gestiondedonaciones.css">'; #cargamos el estilo en especifico de contacto.php
$customScript = '<script src="../view/js/script1.js"></script>'; #cargamos el script
include_once("modules/header.html");  # Incluye <head> y apertura de <body>
//include_once("modules/navbar.php");   # Navbar
require_once '../model/Usuario.php';
session_start();
require_once '../navbar2.php';
if (isset($_SESSION['usuario'])) {
    $oUsuario = $_SESSION["usuario"];
} else {
    $oUsuario = null;
}

if ($oUsuario != null && $oUsuario->getsRol() == "administrador") {
    ?>


    <div class="banner">
        Gesti&oacute;n de Donaciones
    </div>

    <div class="container">
        <h2>Donaciones</h2>
        <div class="cards">
            <div class="card">
                <img src="../view/media/pupitres.jpg" alt="Donaciones">
                <p>Pagos con tarjeta</p>
                <a href="gestiondigital.php">Donacion Dinero →</a>
            </div>
            <div class="card">
                <img src="../view/media/pupitres.jpg" alt="Proyectos">
                <p>Recursos recibidos</p>
                <a href="gestionmaterial.php">Donacion Recurso →</a>
            </div>
        </div>

        <div>
            <a href="sesionadmin.php" class="boton-regresar">Regresar</a>
        </div>

    </div>


    <?php
    include_once("modules/footer.php"); # Footer y cierre de HTML
}
?>