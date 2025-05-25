<?php
/*************************************************************/
/* Archivo:  gestiondebenefactor.php
 * Objetivo: Tabla benefactor
 * Autor: Uriel Vallejo Xicalhua
 *************************************************************/
$customStyles = '<link rel="stylesheet" href="../view/css/vistas/gestiondebenefactor.css">'; #cargamos el estilo en especifico de gestiondebenefactor.php
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

<div class="header">
        Gestion de Benefactor
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Id Proyecto</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>

                   
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>10203</td>
                    <td>Aula B-204 sin mobiliario adecuado</td>
                    <td>Donec a eros justo. Fusce egestas tristique ultrices. Nam tempor, augue nec tincidunt molestie, massa nunc varius arcu, at scelerisque elit erat a magna. Donec quis erat 
                        at libero ultrices mollis. In hac habitasse platea dictumst. Vivamus vehicula leo dui, at porta nisi facilisis finibus. In euismod augue vitae nisi ultricies, non aliquet 
                        urna tincidunt. Integer in nisi eget nulla commodo faucibus efficitur quis massa. Praesent felis est, finibus et nisi ac, hendrerit venenatis libero. Donec consectetur faucibus ipsum id gravida.</td>
                    <td><button onclick="window.location.href='benefactormodificar.php'" class="btn-modificar">Modificar</button>
                    <button onclick="window.location.href='benefactoreliminar.php'" class="btn-eliminar">Eliminar</button>
                </td>
           
                </tr>
            </tbody>
        </table>

      
        <button onclick="window.location.href='benefactorinsertar.php'" class="btn-insertar">Insertar</button>
    </div>


<?php
include_once("modules/footer.html"); # Footer y cierre de HTML
}
?>