<?php
/*************************************************************/
/* Archivo:  usuarioeliminar.php
 * Objetivo: Eliminar campo de un usuario
 * Autor: Uriel Vallejo Xicalhua
 *************************************************************/
$customStyles = '<link rel="stylesheet" href="../view/css/vistas/usuarioeliminar.css">'; #cargamos el estilo en especifico de usuarioeliminar.php
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
$id=$_GET["idUser"];
$oUs=new Usuario();
$oUse=$oUs->readById($id);

if($oUsuario!=null && $oUsuario->getsRol()=="administrador"){
?>


<div class="header">Eliminar Usuario</div>

<div class="container">
   

    <form action="../controller/usuarioEliminado.php"  method="post">
        <label for="id_usuario">Id Usuario:</label>
        <input name="id_usuario" type="text" id="id_usuario" value="<?php  echo $oUse->getnIdUsuario(); ?>" readonly>

        <label for="id_nombre">Nombre:</label>
        <input name="nombre_usuario" type="text"  id=" id_nombre" value="<?php  echo $oUse->getsNombreC(); ?>"  >

        <label for="id_correo">Correo:</label>
        <input name="correo" type="text"  id="id_correo" value="<?php  echo $oUse->getsEmail(); ?>"  >

        <label for="id_contraseña">Contraseña:</label>
        <input name="contraseña" type="text"  id=" id_contraseña" value="<?php  echo $oUse->getsPassword(); ?>" >

        <label for="id_rfc">RFC:</label>
        <input name="rfc" type="text"  id=" id_rfc " value="<?php  echo $oUse->getsRfc(); ?>" >

        <label for="id_domicilio">Domicilio:</label>
        <input name="domicilio" type="text"  id=" id_domicilio" value="<?php  echo $oUse->getsDomiclio(); ?>" >

        <label for="id_rol">Rol:</label>
        <input name="rol" type="text"  id=" id_rol " value="<?php  echo $oUse->getsRol(); ?>"  >

        <div>
        <button class="button">Confirmar</button>

</div>
</form>
       


<?php
include_once("modules/footer.html"); # Footer y cierre de HTML
}
?>