<?php
/*************************************************************/
/* Archivo:  benefactorinsertar.php
 * Objetivo: Insertar campo de un benefactor
 * Autor: Uriel Vallejo Xicalhua
 *************************************************************/
$customStyles = '<link rel="stylesheet" href="../view/css/vistas/benefactorinsertar.css">'; #cargamos el estilo en especifico de benefactorinsertar.php
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


<div class="header">Insertar Benefactor</div>

<div class="container">
   

    <form action="../controller/benefactorInsertarController.php" method="post">   
        <label for="id_titulo">Nombre:</label>
        <input name="titulo" type="text"  id=" id_titulo ">

        <label for="id_dscripcion">Descripcion:</label>
        <input name="descripcion" type="text"  id=" id_dscripcion">


        <label for="id_proyecto">Id Proyecto:</label>
        <input name="id_proyecto" type="text" id="id_proyecto">


   <div>
        <input class="button"   type="submit" value="Confirmar"  />

</div>
</form>
       


<?php
include_once("modules/footer.php"); # Footer y cierre de HTML
}
?>