<?php
/*************************************************************/
/* Archivo:  benefactormodificar.php
 * Objetivo: Modificar campo de un benefactor
 * Autor: Uriel Vallejo Xicalhua
 *************************************************************/
$customStyles = '<link rel="stylesheet" href="../view/css/vistas/benefactormodificar.css">'; #cargamos el estilo en especifico de benefactormodificar.php
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
$oBenefactor=new Beneficiario();
$oBenefac=$oBenefactor->readById($id_p);
if($oUsuario!=null && $oUsuario->getsRol()=="administrador"){
?>


<div class="header">Modificar Benefactor</div>

<div class="container">
    <table>
        <tr>
            <th>Id Proyecto</th>
            <th>Titulo</th>
            <th>Descripción</th>
        </tr>
    </table>

    <form action="../controller/benefactorModificarController.php" method="post">
        
        <label for="id_benefactor">Id Benefactor:</label>
        <input name="id_pro" type="text" id="id_proyecto" value="<?php echo $oBenefac->getnIdBenefactor(); ?>" readonly>

        <label for="id_titulo">Titulo:</label>
        <input name="titulo" type="text"  id=" id_titulo" value="<?php echo $oBenefac->getsName(); ?>">

        <label for="id_dscripcion">Descripcion:</label>
        <input name="descripcion" type="text"  id=" id_dscripcion" value="<?php echo $oBenefac->getsDescription(); ?>">

   <div>
        <button class="button">Confirmar</button>

</div>
</form> 


<?php
include_once("modules/footer.html"); # Footer y cierre de HTML
}
?>