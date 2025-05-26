<?php
/*************************************************************/
/* Archivo:  proyectoinsertar.php
 * Objetivo: Insertar campo de un proyecto
 * Autor: Uriel Vallejo Xicalhua
 *************************************************************/
$customStyles = '<link rel="stylesheet" href="../view/css/vistas/proyectoinsertar.css">'; #cargamos el estilo en especifico de proyectoinsertar.php
$customScript = '<script src="../view/js/script1.js"></script>'; #cargamos el script
include_once("modules/header.html");  # Incluye <head> y apertura de <body>
include_once("modules/navbar.php");   # Navbar
include_once '../model/Usuario.php';
session_start();
if (isset($_SESSION['usuario'])) {
    $oUsuario = $_SESSION["usuario"];
} else {
    $oUsuario = null;
}

if($oUsuario!=null && $oUsuario->getsRol()=="administrador"){
?>


<div class="header">Insertar Proyecto</div>

<div class="container">
    <table>
        <tr>
            <th>Id Proyecto</th>
            <th>Titulo</th>
            <th>Descripción</th>
            <th>Foto</th>
        </tr>
    </table>

    <form action="../controller/proyectoInsertado.php" method="POST">
    <input type="hidden" name="id_usuario" value="<?php echo $oUsuario->getnIdUsuario(); ?>">

    <label for="id_titulo">Titulo:</label>
    <input name="titulo" type="text" id="id_titulo" required>

    <label for="id_descripcion">Descripcion:</label>
    <input name="descripcion" type="text" id="id_descripcion" required>

    <label for="id_foto">Foto:</label>
    <input name="foto" type="file" id="id_foto" required>

    <label for="id_benefactor">Id Benefactor:</label>
    <input name="id_benefactor" type="text" id="id_benefactor" required>

    <button type="submit" class="button">Confirmar</button>
</form>

</div>
       


<?php
include_once("modules/footer.html"); # Footer y cierre de HTML
}
?>