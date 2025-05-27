<?php
/*************************************************************/
/* Archivo:  benefactoreliminar.php
 * Objetivo: Eliminar campo de un benefactor
 * Autor: Uriel Vallejo Xicalhua
 *************************************************************/
$customStyles = '<link rel="stylesheet" href="../view/css/vistas/benefactoreliminar.css">'; #cargamos el estilo en especifico de benefactoreliminar.php
$customScript = '<script src="../view/js/script1.js"></script>'; #cargamos el script
include_once("modules/header.html");  # Incluye <head> y apertura de <body>
include_once("modules/navbar.php");   # Navbar
require_once '../model/Usuario.php';
require_once ('../model/Beneficiario.php');
session_start();
if (isset($_SESSION['usuario'])) {
    $oUsuario = $_SESSION["usuario"];
} else {
    $oUsuario = null;
}

$id_p= $_GET["idBenefactor"];
$oBenefactor=new Benefactor();
$oBenefac=$oBenefactor->readById($id_p);
if($oUsuario!=null && $oUsuario->getsRol()=="administrador"){
?>


<div class="header">Eliminar Benefactor</div>

<div class="container">
   

    <form action="../controller/benefactorEliminarController.php"  method="post">
    <label for="id_benefactor">Id Benefactor:</label>
        <input name="id_pro" type="text" id="id_proyecto" value="<?php echo $oBenefac->getnIdBenefactor(); ?>" readonly>

        <label for="id_titulo">Nombre:</label>
        <input name="titulo" type="text"  id=" id_titulo " value="<?php echo $oBenefac->getsName(); ?>" readonly>

        <label for="id_dscripcion">Descripcion:</label>
        <input name="descripcion" type="text"  id=" id_dscripcion" value="<?php echo $oBenefac->getsDescription(); ?>" readonly>

   <div>
        <button class="button" onclick="">Confirmar</button>

</div>
</form>  
    
       


<?php
include_once("modules/footer.html"); # Footer y cierre de HTML
require_once '../model/Usuario.php';
session_start();
if (isset($_SESSION['usuario'])) {
    $oUsuario = $_SESSION["usuario"];
} else {
    $oUsuario = null;
}

if($oUsuario!=null && $oUsuario->getsRol()=="administrador"){

}
}
?>