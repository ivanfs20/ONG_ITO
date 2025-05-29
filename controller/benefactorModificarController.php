<?php
require_once '../model/Beneficiario.php';
$oBenefactor=new Beneficiario();
$id=$_POST['id_pro'];
$name=$_POST['titulo'];
$description=$_POST['descripcion'];

$oBenefactor->setnIdBenefactor($id);
$oBenefactor->setsName($name);
$oBenefactor->setsDescription($description);

//$oBenefactor->update();

//header("Location: ../view/gestiondebenefactor.php");


try {
    $resultado = $oBenefactor->update(); // Este método debe devolver true si se insertó correctamente

    if ($resultado) {
        header("Location: ../view/popbeneficiario.php?msg=modificado");
    } else {
        header("Location: ../view/popbeneficiario.php?msg=errorregistro");
    }
} catch (Exception $e) {
    error_log("Error al modificar benefactor: " . $e->getMessage());
    header("Location: ../view/popbeneficiario.php?msg=errorregistro");
}
exit();

?>