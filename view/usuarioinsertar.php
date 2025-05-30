<?php
/*************************************************************/
/* Archivo:  usuarioinsertar.php
 * Objetivo: Insertar campo de un usuario
 * Autor: Uriel Vallejo Xicalhua
 *************************************************************/
$customStyles = '<link rel="stylesheet" href="../view/css/vistas/usuarioinsertar.css">'; #cargamos el estilo en especifico de usuarioinsertar.php
$customScript = '<script src="../view/js/script1.js"></script>'; #cargamos el script
include_once("modules/header.html");  # Incluye <head> y apertura de <body>
//include_once("modules/navbar.php");   # Navbar
require_once '../model/Usuario.php';
session_start();
if (isset($_SESSION['usuario'])) {
    $oUsuario = $_SESSION["usuario"];
    require_once '../navbar2.php';
} else {
    $oUsuario = null;
    require_once 'modules/navbar.php';
}

if($oUsuario!=null && $oUsuario->getsRol()=="administrador"){
?>


<div class="header">Insertar Usuario</div>

<div class="container">
   

    <form action="../controller/usuarioinsertado.php" method="POST">

        <label for="id_nombre">Nombre:</label>
        <input name="nombre_usuario" type="text"  id=" id_nombre">

        <label for="id_correo">Correo:</label>
        <input name="correo" type="text"  id=" id_dscripcion " >

        <label for="id_contraseña">Contraseña:</label>
        <input name="contraseña" type="text"  id=" id_contraseña " >

        <label for="id_rol">RFC:</label>
        <input name="rfc" type="text"  id=" id_rol " >

        <label for="id_domicilio">Domicilio:</label>
        <input name="domicilio" type="text"  id=" id_domicilio" > 

        <label for="id_rol">Rol:</label>
        <input name="rol" type="text"  id=" id_rol " >
        <!--
        <select name="rol" id="id_rol">
            <option value="administrador">Administrador</option>
            <option value="donador">Donador</option>
        </select> -->
        <div>
        <button class="button">Confirmar</button>

</div>
       
<?php
include_once("modules/footer.php"); # Footer y cierre de HTML
}
?>