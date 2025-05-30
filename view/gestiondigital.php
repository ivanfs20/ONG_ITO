<?php
/*************************************************************/
/* Archivo:  gestiondigital.php
 * Objetivo: Tabla donaciones digitales
 * Autor: Uriel Vallejo Xicalhua
 *************************************************************/
$customStyles = '<link rel="stylesheet" href="../view/css/vistas/gestiondigital.css">';
$customScript = '<script src="../view/js/script1.js"></script>';
include_once("modules/header.html");
//include_once("modules/navbar.php");
require_once '../model/Usuario.php';
require_once '../model/Digital.php';

session_start();
require_once '../navbar2.php';
if (isset($_SESSION['usuario'])) {
    $oUsuario = $_SESSION["usuario"];
} else {
    $oUsuario = null;
}

if ($oUsuario != null && $oUsuario->getsRol() == "administrador") {
    $oDigital = new Digital();
    $arrDonaciones = $oDigital->getAll();
    
    $oUsuarioModel = new Usuario();
    $usuariosCache = [];
    ?>

    <div class="header">
        Gestión de Donaciones Digitales
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>ID Donación</th>
                    <th>Donador</th>
                    <th>Monto</th>
                    <th>Folio</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th>Comprobante</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($arrDonaciones as $oDonacion) {

                    $idDonador = $oDonacion->getnIdUsuario();
                    if (!isset($usuariosCache[$idDonador])) {
                        $tempUsuario = $oUsuarioModel->readById($idDonador);
                        $usuariosCache[$idDonador] = $tempUsuario ? $tempUsuario->getsNombreC() : "Desconocido";
                    }
                    $nombreDonador = $usuariosCache[$idDonador];
                    
                    $comprobanteBinario = $oDonacion->getaPhoto();
                    $base64Comprobante = base64_encode($comprobanteBinario);
                    $comprobanteSrc = 'data:image/jpeg;base64,' . $base64Comprobante;
                    
                    $estado = $oDonacion->getbStatus() == 0 ? 'Confirmado' : 'Pendiente';
                    $fecha = date('d/m/Y', strtotime($oDonacion->getdFechaCreacion()));
                    ?>
                    <tr>
                        <td><?php echo $oDonacion->getnIdDonacion(); ?></td>
                        <td><?php echo htmlspecialchars($nombreDonador); ?></td>
                        <td>$<?php echo number_format($oDonacion->getnAmount(), 2); ?></td>
                        <td><?php echo $oDonacion->getnFolio(); ?></td>
                        <td><?php echo $fecha; ?></td>
                        <td class="<?php echo strtolower($estado); ?>"><?php echo $estado; ?></td>
                        <td>
                            <img src="<?php echo $comprobanteSrc; ?>" alt="Comprobante" width="80" 
                                 onclick="mostrarComprobante('<?php echo $comprobanteSrc; ?>')"
                                 class="comprobante-thumbnail">
                        </td>
                        <td>
                                <button onclick="" 
                                        class="btn-confirmar">Confirmar</button>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>

        <div class="action-buttons">
            <a href="gestiondedonaciones.php" class="boton-regresar">Regresar</a>
        </div>

    </div>

    
    <?php
    include_once("modules/footer.php");
}
?>