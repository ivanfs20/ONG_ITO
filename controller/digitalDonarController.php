<?php 
require_once '../model/Digital.php';
require_once '../model/Beneficiario.php';
session_start();
$_SESSION['tipo_donacion'] = "digital";

$oDigital=new Digital();
$oBeneficiario=new Beneficiario;

$idUsuario=$_POST['id_usuario'];
$folio=$_POST['id-donacion'];
$donador=$_POST['nombre-del-donador'];
$monto=$_POST['monto-total'];
$beneficiario=$_POST['beneficiario'];
$fecha=$_POST['fecha-donacion'];

$_SESSION['beneficiario']=$beneficiario;
$_SESSION['monto']=$monto;
$_SESSION['folio']=$folio;
$_SESSION['fecha']=$fecha;
/*if(isset($_FILES['imagen-r']) && $_FILES['imagen-r']['error']==0){
    $photo=file_get_contents($_FILES['imagen-r']['tmp_name']);
}else{
    $photo=null;
}*/


$oBeneficiario->readByName($beneficiario);
$idBeneficiario=$oBeneficiario->getnIdBenefactor();

$oDigital->setnFolio($folio);
$oDigital->setsMethod('Pago referenciado (en ventanilla)');
$oDigital->setaPhoto(0x00);
$oDigital->setnAmount($monto);
$oDigital->setdFechaCreacion($fecha);
$oDigital->setnIdUsuario($idUsuario);
$oDigital->setnIdBenefactor($idBeneficiario);

$oDigital->create();


header("Location: ../view/agradecimiento.php");
exit();





?>