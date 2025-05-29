<?php 
require_once '../model/Beneficiario.php';
$oBenefactor=new Beneficiario();
$name=$_POST['titulo'];
$descripcion=$_POST['descripcion'];
$id_proyecto=$_POST['id_proyecto'];
$oBenefactor->setsName($name);
$oBenefactor->setsDescription($descripcion);

$oBenefactor->setnIdProyecto($id_proyecto);

//header("Location: ../view/gestiondebenefactor.php");


try {
    $resultado = $oBenefactor->insert(); // Este método debe devolver true si se insertó correctamente

    if ($resultado) {
        header("Location: ../view/popbeneficiario.php?msg=agregado");
    } else {
        header("Location: ../view/popbeneficiario.php?msg=errorregistro");
    }
} catch (Exception $e) {
    error_log("Error al registrar benefactor: " . $e->getMessage());
    header("Location: ../view/popbeneficiario.php?msg=errorregistro");
}
exit();


?>