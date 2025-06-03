<?php
/*************************************************************/
/* Archivo:  testimoniomodificar.php
 * Objetivo: Modificar campo de un indiciomodificar
 * Autor: Uriel Vallejo Xicalhua
 *************************************************************/
$customStyles = '<link rel="stylesheet" href="../view/css/vistas/testimoniomodificar.css">'; #cargamos el estilo en especifico de testimoniomodificar.php
$customScript = '<script src="../view/js/script1.js"></script>'; #cargamos el script
include_once("modules/header.html");  # Incluye <head> y apertura de <body>
include_once("modules/navbar.php");   # Navbar
include_once '../model/Comentarios.php';
include_once '../model/Usuario.php';

$id = $_GET["id"];
$nom = $_GET["nom"] ?? null;
$oComen = new Comentarios();
$oComentario = $oComen->getById($id);

// Obtener el nombre del usuario
$oUsuario = new Usuario();
$usuario = $oUsuario->readById($oComentario->getNidUsuario());
$nombreUsuario = $usuario ? $usuario->getsNombreC() : "Desconocido";
?>


<div class="header">Modificar Testimonio</div>

<div class="container">
   
    <form>
             
        <label for="id_testimonio">Id Testimonio:</label>
        <input name="id_testimonio" type="text" id="id_testimonio" value="<?php echo $oComentario->getNidComentario(); ?>" readonly>

        <label for="testimonio">Testimonio:</label>
        <input name="testimonio" type="text" id="testimonio" value="<?php echo htmlspecialchars($oComentario->getSComentario()); ?>">

        <label for="nombre_usuario">Nombre:</label>
        <input name="nombre_usuario" type="text" id="nombre_usuario" value="<?php echo htmlspecialchars($nombreUsuario); ?>">

        <div>
            <button class="button">Confirmar</button>
        </div>
    </form>
</div>

<?php
include_once("modules/footer.php"); # Footer y cierre de HTML
?>