<?php 
require_once '../model/Usuario.php';
$id=$_POST['id_usuario'];
$oUsuario=new Usuario ();

$oUsuario->deleteById($id);

header("Location: ../view/gestiondeusuarios.php");

?>