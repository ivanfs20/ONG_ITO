<?php 
require_once '../model/Beneficiario.php';
$oBenefactor=new Beneficiario();
$name=$_POST['titulo'];
$descripcion=$_POST['descripcion'];
$id_proyecto=$_POST['id_proyecto'];
$oBenefactor->setsName($name);
$oBenefactor->setsDescription($descripcion);
$oBenefactor->setnIdProyecto($id_proyecto);
$oBenefactor->insert();

header("Location: ../view/gestiondebenefactor.php");




?>