<?php
require_once '../model/Beneficiario.php';
$oBenefactor=new Beneficiario();
$id=$_POST['id_pro'];
$name=$_POST['titulo'];
$description=$_POST['descripcion'];

$oBenefactor->setnIdBenefactor($id);
$oBenefactor->setsName($name);
$oBenefactor->setsDescription($description);

$oBenefactor->update();

header("Location: ../view/gestiondebenefactor.php");

?>