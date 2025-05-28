<?php
/*************************************************************/
/* Archivo:  gestiondigital.php
 * Objetivo: Tabla donaciones digitales
 * Autor: Uriel Vallejo Xicalhua
 *************************************************************/
$customStyles = '<link rel="stylesheet" href="../view/css/vistas/gestiondigital.css">'; #cargamos el estilo en especifico de gestiondigital.php
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

if ($oUsuario != null && $oUsuario->getsRol() == "administrador") {
    ?>

    <div class="header">
        Recursos Donados
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Id donacion</th>
                    <th>Nombre Donador</th>
                    <th>Monto</th>
                    <th>Fecha Generada</th>
                    <th>Folio</th>
                    <th>Estado</th>
                    <th>Comprobante</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>123</td>
                    <td>toño</td>
                    <td>1,223</td>
                    <td>14/05/2025</td>
                    <td>234153258</td>
                    <td>Pendiente</td>
                    <td>Comprobante</td>
                    <td><button class="btn-confirmar">Confirmar</button></td>
                </tr>
            </tbody>
        </table>


        <div>
            <a href="gestiondedonaciones.php" class="boton-regresar">Regresar</a>
        </div>


    </div>


    <?php
    include_once("modules/footer.html"); # Footer y cierre de HTML
}
?>