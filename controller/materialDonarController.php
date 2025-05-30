<?php 
require_once '../model/Material.php';
require_once '../model/Beneficiario.php';
$oMaterial=new Material();
$oBeneficiario=new Beneficiario;
$idDonador=$_POST['id_usuario'];
$nombreRecurso=$_POST['nombre-recurso'];
$descripcionRecurso=$_POST['descripcion-recurso'];
$cantidadRecurso=$_POST['cantidad-del-recurso'];
$nombreBeneficiario=$_POST['nombre-beneficiario'];

/*if(isset($_FILES['imagen-r']) && $_FILES['imagen-r']['error']==0){
    $photo=file_get_contents($_FILES['imagen-r']['tmp_name']);
}else{
    $photo=null;
}*/
if (isset($_POST["photo-data"]) && !empty($_POST["photo-data"])) {
    $photo = base64_decode($_POST["photo-data"]);
} else {
    $photo = null;
}

$oBeneficiario->readByName($nombreBeneficiario);
$idBeneficiario=$oBeneficiario->getnIdBenefactor();

$oMaterial->setsName($nombreRecurso);
$oMaterial->setsDescription($descripcionRecurso);
$oMaterial->setaPhoto($photo);
$oMaterial->setnAmount(intval($cantidadRecurso));
$oMaterial->setbStatus(0);
$oMaterial->setdFechaCreacion(date("Y-m-d"));
$oMaterial->setnIdUsuario($idDonador);
$oMaterial->setnIdBenefactor(intval($idBeneficiario));

$oMaterial->Create();


header("Location: ../view/agradecimiento.php");






?>