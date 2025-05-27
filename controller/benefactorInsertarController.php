<?php 
require_once '../model/Beneficiario.php';
$oBenefactor=new Beneficiario();
$name=$_POST['titulo'];
$descripcion=$_POST['descripcion'];

$oBenefactor->setsName($name);
$oBenefactor->setsDescription($descripcion);

$oBenefactor->insert();

header("Location: ../view/gestiondebenefactor.php");




?>