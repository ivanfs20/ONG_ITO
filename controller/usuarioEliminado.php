<?php 
require_once '../model/Usuario.php';
$id=$_POST['id_usuario'];
$oUsuario=new Usuario ();

//$oUsuario->deleteById($id);


try {
    $resultado = $oUsuario->deleteById($id); // Este método debe devolver true si se insertó correctamente

    if ($resultado) {
        header("Location: ../view/popusuario.php?msg=borrado");
    } else {
        header("Location: ../view/popusuario.php?msg=errorregistro");
    }
} catch (Exception $e) {
    error_log("Error al eliminar usuario: " . $e->getMessage());
    header("Location: ../view/popusuario.php?msg=errorregistro");
}
exit();

?>