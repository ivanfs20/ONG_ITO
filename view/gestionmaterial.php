<?php
/*************************************************************/
/* Archivo:  gestionmaterial.php
 * Objetivo: Menu de los tipos de donaciones
 * Autor: Uriel Vallejo Xicalhua
 *************************************************************/
$customStyles = '<link rel="stylesheet" href="../view/css/vistas/gestionmaterial.css">'; #cargamos el estilo en especifico de material.php
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
                    <th>Id material</th>
                    <th>Cantidad</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Imagen</th>
                    <th>Id usuario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>1</td>
                    <td>Banca</td>
                    <td>Color Blanco</td>
                    <td>Seminueva</td>
                    <td>.jpg</td>
                    <td>3</td>
                    <td><button class="btn-eliminar">Eliminar</button></td>
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