<?php 
require_once '../model/Material.php';
$oMaterial=new Material();
$id=$_POST["idDonacion"];

$oMaterial->setnIdDonacion($id);
$oMaterial->setbStatus(1);

$oMaterial->updateToTrue();

//header ("Location: ../view/gestionmaterial.php");
header("Location: ../view/popmaterialRecibido.php?msg=recibido");
exit();


?>