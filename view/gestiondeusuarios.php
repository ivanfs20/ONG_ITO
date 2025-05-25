<?php
/*************************************************************/
/* Archivo:  gestiondeusuarios.php
 * Objetivo: Menu de los tipos de donaciones
 * Autor: Uriel Vallejo Xicalhua
 *************************************************************/
$customStyles = '<link rel="stylesheet" href="../view/css/vistas/gestiondeusuarios.css">'; #cargamos el estilo en especifico de material.php
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
        Gestion de Usuarios
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Id Usuario</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Contraseña</th>
                    <th>Rol</th>
                </tr>
            </thead>
            <tbody>

            <?php 
                $arrUsuarios = $oUsuario -> getAll();
                foreach($arrUsuarios as $oUser){
            ?>
                <tr>
                    <td><?php echo $oUser-> getnIdUsuario();?></td>
                    <td><?php echo $oUser-> getsNombreC();?></td>
                    <td><?php echo $oUser-> getsEmail();?></td>
                    <td><?php echo $oUser-> getsPassword();?></td>
                    <td><?php echo $oUser-> getsRol();?></td>
                    <td>
                    <button onclick="window.location.href='usuariomodificar.php'" class="btn-modificar">Modificar</button>
                    <button onclick="window.location.href='usuarioeliminar.php'" class="btn-eliminar">Eliminar</button>
                    </td>
                </tr>
            <?php
                }
            ?>
            </tbody>
        </table>

        <button onclick="window.location.href='usuarioinsertar.php'" class="btn-insertar">Insertar</button>
    </div>


<?php
include_once("modules/footer.html"); # Footer y cierre de HTML
}
?>