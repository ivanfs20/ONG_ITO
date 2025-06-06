<?php
/*************************************************************/
/* Archivo:  gestiondebenefactor.php
 * Objetivo: Tabla benefactor
 * Autor: Uriel Vallejo Xicalhua
 *************************************************************/
$customStyles = '<link rel="stylesheet" href="../view/css/vistas/gestiondebenefactor.css">'; #cargamos el estilo en especifico de gestiondebenefactor.php
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

if($oUsuario!=null && $oUsuario->getsRol()=="administrador"){
?>

<div class="header">
        Gesti&oacute;n de Beneficiario
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Id Beneficiario</th>
                    <th>Nombre</th>
                    <th>Descripci&oacute;n</th>
                    <th>Nombre Proyecto</th>

                   
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php require_once '../controller/benefactorMostrarController.php'; ?>                
                </tr>
            </tbody>
        </table>

      
        <button onclick="window.location.href='benefactorinsertar.php'" class="btn-insertar">Insertar</button>
        <div>
            <a href="gestionpb.php" class="boton-regresar">Regresar</a>
        </div>
    </div>



<?php
include_once("modules/footer.php"); # Footer y cierre de HTML
}
?>