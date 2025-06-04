<?php 
require_once '../model/Comentarios.php';
$oComentario =new Comentarios();
$id=$_GET["id"];

$oComentario->setNidComentario($id);
$oComentario->setBStatus(1);

$oComentario->updateToTrue();

//header ("Location: ../view/gestionmaterial.php");
header("Location: ../view/gestiondetestimonio.php?msg=recibido");
exit();
?>