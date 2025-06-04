<?php
/*/
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
        Gestión de Donaciones Bancarias
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
                    
                    //$comprobanteBinario = $oDonacion->getaPhoto();
                    //$base64Comprobante = base64_encode($comprobanteBinario);
                    //$comprobanteSrc = 'data:image/jpeg;base64,' . $base64Comprobante;
                    
                    $estado = $oDonacion->getbStatus() == 1 ? 'Confirmado' : 'Pendiente';
                    $fecha = date('d/m/Y', strtotime($oDonacion->getdFechaCreacion()));
                    ?>
                    <tr>
                        <td><?php echo $oDonacion->getnIdDonacion(); ?></td>
                        <td><?php echo htmlspecialchars($nombreDonador); ?></td>
                        <td>$<?php echo number_format($oDonacion->getnAmount(), 2); ?></td>
                        <td><?php echo $oDonacion->getnFolio(); ?></td>
                        <td><?php echo $fecha; ?></td>
                        <td class="<?php echo strtolower($estado); ?>"><?php echo $estado; ?></td>
                       
                        <?php
                            if($oDonacion->getbStatus()==0){

                                ?>
                            <td>
                            <form action="../controller/confirmarDonacion.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $oDonacion->getnIdDonacion();  ?>">

<button 
class="btn-confirmar">CONFIRMAR</button>
                            </form>
                            </td>
                                <?php
                            }else{
                        ?>
                       <td>



<form action="../controller/emailController.php" method="post">

<input type="hidden" name="correo_donador" value="<?php echo $tempUsuario->getsEmail();  ?>">
<input type="hidden" name="nombre_donador" value="<?php echo $tempUsuario->getsNombreC();  ?>">                            
<input type="hidden" name="domicilio_donador" value="<?php echo $tempUsuario->getsDomiclio();  ?>">
<input type="hidden" name="folio" value="<?php echo $oDonacion->getnFolio(); ?>">
<input type="hidden" name="amount" value="<?php echo $oDonacion->getnAmount(); ?>">

<input type="hidden" name="metodo_pago" value="Deposito Bancario">
<input type="hidden" name="beneficiario" value="<?php echo $oDonacion->getnIdBenefactor();?>">


<input type="hidden" name="rfc_donador" value="<?php echo $tempUsuario->getsRfc();  ?>">
<input type="hidden" name="id" value="<?php echo $oDonacion->getnIdDonacion();  ?>">

<button 
            class="btn-confirmar">ENVIAR EMAIL</button>
</form>

<form action="../controller/pdfDocumentoDI.php" method="post">
<input type="hidden" name="correo_donador" value="<?php echo $tempUsuario->getsEmail();  ?>">
<input type="hidden" name="nombre_donador" value="<?php echo $tempUsuario->getsNombreC();  ?>">                            
<input type="hidden" name="domicilio_donador" value="<?php echo $tempUsuario->getsDomiclio();  ?>">
<input type="hidden" name="folio" value="<?php echo $oDonacion->getnFolio(); ?>">
<input type="hidden" name="amount" value="<?php echo $oDonacion->getnAmount(); ?>">

<input type="hidden" name="metodo_pago" value="Deposito Bancario">
<input type="hidden" name="beneficiario" value="<?php echo $oDonacion->getnIdBenefactor();?>">


<input type="hidden" name="rfc_donador" value="<?php echo $tempUsuario->getsRfc();  ?>">
<input type="hidden" name="id" value="<?php echo $oDonacion->getnIdDonacion();  ?>">

<button 
class="btn-confirmar">DESCARGAR PDF</button>
</form>
                        <?php
                            }
                        ?>

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