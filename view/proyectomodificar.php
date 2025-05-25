<?php
/*************************************************************/
/* Archivo:  proyectomodificar.php
 * Objetivo: Modificar campo de un proyecto
 * Autor: Uriel Vallejo Xicalhua
 *************************************************************/
$customStyles = '<link rel="stylesheet" href="../view/css/vistas/proyectomodificar.css">'; #cargamos el estilo en especifico de proyectomodificar.php
$customScript = '<script src="../view/js/script1.js"></script>'; #cargamos el script
include_once("modules/header.html");  # Incluye <head> y apertura de <body>
include_once("modules/navbar.php");   # Navbar
require_once '../model/Usuario.php';
require_once '../model/Proyecto.php';



$idProyecto = $_GET["idProyecto"];

            $oProyecto = new Proyecto();
            $oProyecto = $oProyecto -> getById($idProyecto);


session_start();
if (isset($_SESSION['usuario'])) {
    $oUsuario = $_SESSION["usuario"];
} else {
    $oUsuario = null;
}

if($oUsuario!=null && $oUsuario->getsRol()=="administrador"){
?>


<div class="header">Modificar Proyecto</div>

<div class="container">
    <table>
        <tr>
            <th>Id Proyecto</th>
            <th>Titulo</th>
            <th>Descripción</th>
            <th>Foto</th>
        </tr>
    </table>

    <form  action="../controller/proyectoModificado.php" method="POST">


        <label for="id_proyecto">Id Proyecto:</label>
        <input name="id_proyecto" type="text" id="id_proyecto" value=<?php echo $oProyecto->getnIdProyecto();?> readonly>

        <label for="id_titulo">Titulo:</label>
        <input name="titulo" type="text"  id=" id_titulo " value="<?php echo htmlspecialchars($oProyecto->getsTitle()); ?>"> 

        <label for="id_dscripcion">Descripcion:</label>
        <input name="descripcion" type="text"  id=" id_titulo " value="<?php echo htmlspecialchars($oProyecto->getsDescription());?>">

        <label for="id_foto">Foto:</label>
        <input name="foto" type="text"  id=" id_titulo " value=<?php echo $oProyecto->getaPhoto();?>>

        <label for="id_foto">Id Usuario:</label>
        <input name="id_usuario" type="text"  id=" id_titulo " value=<?php echo $oProyecto->getnIdUsuario();?> readonly>

        <label for="id_foto">ID Benefactor:</label>
        <input name="id_benefactor" type="text"  id=" id_titulo " value=<?php echo $oProyecto->getnIdBenefactor();?>>

        <div>
        <button class="button">Confirmar</button>

</div>
       


<?php
include_once("modules/footer.html"); # Footer y cierre de HTML
}
?>