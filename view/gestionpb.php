<?php
/*************************************************************/
/* Archivo:  gestionpb.php
 * Objetivo: Menu de los tipos de areas de apoyo 
 * Autor: Uriel Vallejo Xicalhua
 *************************************************************/
$customStyles = '<link rel="stylesheet" href="../view/css/vistas/gestionpb.css">'; #cargamos el estilo en especifico de gestionpb.php
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

if($oUsuario!=null && $oUsuario->getsRol()=="administrador"){
?>


    <div class="banner">
        Gestion de Proyectos y Benefactor
    </div>

    <div class="container">
        <h2>Administracion de Areas</h2>
        <div class="cards">
            <div class="card">
                <img src="../view/media/pupitres.jpg" alt="Donaciones">
                <p></p>
                <a href="gestiondeproyecto.php">Proyectos →</a>
            </div>
            <div class="card">
                <img src="../view/media/salon.jpg" alt="Proyectos">
                <p></p>
                <a href="gestiondebenefactor.php">Benefactor →</a>
            </div>
            <div class="card">
                <img src="../view/media/salon.jpg" alt="Mensajes">
                <p></p>
                <a href="gestiondeindicios.php">Indicios →</a>
            </div>
        </div>

    </div>


<?php
include_once("modules/footer.html"); # Footer y cierre de HTML
}
?>