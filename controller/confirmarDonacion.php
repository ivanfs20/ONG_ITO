<?php 
require_once '../model/Digital.php';
$oDigital=new Digital();
$id=$_POST["id"];

$oDigital->setnIdDonacion($id);
$oDigital->setbStatus(1);

$oDigital->updateToTrue();

header ("Location: ../view/popconfirmarDonacion.php?msg=confirmado");
//header("Location: ../view/popmaterialRecibido.php?msg=recibido");
//exit();
?>