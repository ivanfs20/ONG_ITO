<?php
require_once "../model/Beneficiario.php";
$oBenefactor=new Beneficiario();
$id=$_POST['id_pro'];
$name=$_POST['titulo'];
$description=$_POST['descripcion'];

//$oBenefactor->deleteById($id);

//header("Location: ../view/gestiondebenefactor.php");


try {
    $resultado = $oBenefactor->deleteById($id); // Este método debe devolver true si se insertó correctamente

    if ($resultado) {
        header("Location: ../view/popbeneficiario.php?msg=borrado");
    } else {
        header("Location: ../view/popbeneficiario.php?msg=errorregistro");
    }
} catch (Exception $e) {
    error_log("Error al eliminar benefactor: " . $e->getMessage());
    header("Location: ../view/popbeneficiario.php?msg=errorregistro");
}
exit();

?>
