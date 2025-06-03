<?php
/*************************************************************/
/* Archivo:  gestiondetestimonio.php
 * Objetivo: Tabla indicios
 * Autor: Uriel Vallejo Xicalhua
 *************************************************************/
$customStyles = '<link rel="stylesheet" href="../view/css/vistas/gestiondetestimonio.css">';
$customScript = '<script src="../view/js/script1.js"></script>';
include_once("modules/header.html");
require_once '../model/Usuario.php';
require_once '../model/Comentarios.php';

session_start();
require_once '../navbar2.php';
if (isset($_SESSION['usuario'])) {
    $oUsuario = $_SESSION["usuario"];
} else {
    $oUsuario = null;
}

if ($oUsuario != null && $oUsuario->getsRol() == "administrador") {
    $oComentarios = new Comentarios();
    $arrComentarios = $oComentarios->getAll();
    
    $oUsuarioModel = new Usuario();
    $usuariosCache = [];
?>

<div class="header">

        Gesti&oacute;n de Testimonio
    </div>


<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>ID Testimonio</th>
                <th>Testimonio</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($arrComentarios as $oComentario) {
                $idUsuario = $oComentario->getNidUsuario();
                if (!isset($usuariosCache[$idUsuario])) {
                    $tempUsuario = $oUsuarioModel->readById($idUsuario);
                    $usuariosCache[$idUsuario] = $tempUsuario ? $tempUsuario->getsNombreC() : "Desconocido";
                }
                $nombreUsuario = $usuariosCache[$idUsuario];
            ?>
            <tr>
                <td><?php echo $oComentario->getNidComentario(); ?></td>
                <td><?php echo htmlspecialchars($oComentario->getSComentario()); ?></td>
                <td><?php echo htmlspecialchars($nombreUsuario); ?></td>
                <td>
                    <button onclick="window.location.href='testimoniomodificar.php?id=<?php echo $oComentario->getNidComentario(); ?>'" 
                            class="btn-modificar">Modificar</button>
                    <button onclick="window.location.href='testimonioeliminar.php?id=<?php echo $oComentario->getNidComentario(); ?>'" 
                            class="btn-eliminar">Eliminar</button>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <button onclick="window.location.href='testimonioinsertar.php'" class="btn-insertar">Insertar</button>
    <div class="action-buttons">
        
        <a href="gestionpb.php" class="boton-regresar">Regresar</a>
    </div>
</div>

<?php
    include_once("modules/footer.php");
}
?>