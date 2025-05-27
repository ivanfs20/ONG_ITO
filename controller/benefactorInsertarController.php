<?php 
require_once '../model/Benefactor.php';
$oBenefactor=new Benefactor();
$name=$_POST['titulo'];
$descripcion=$_POST['descripcion'];

$oBenefactor->setsName($name);
$oBenefactor->setsDescription($descripcion);

$oBenefactor->insert();

header("Location: ../view/gestiondebenefactor.php");




?>