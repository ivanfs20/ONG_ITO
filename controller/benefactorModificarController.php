<?php
require_once '../model/Beneficiario.php';
$oBenefactor=new Beneficiario();
$id=$_POST['id_pro'];
$name=$_POST['titulo'];
$description=$_POST['descripcion'];
$id_proyecto=$_POST['id_proyecto'];

$oBenefactor->setnIdBenefactor($id);
$oBenefactor->setsName($name);
$oBenefactor->setsDescription($description);
$oBenefactor->setnIdProyecto($id_proyecto);


$oBenefactor->update();

header("Location: ../view/gestiondebenefactor.php");

?>