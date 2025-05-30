<?php
include_once('../model/Beneficiario.php');

if (isset($_GET['idProyecto'])) {
    $idProyecto = intval($_GET['idProyecto']);
    $oBeneficiario = new Beneficiario();
    $beneficiarios = $oBeneficiario->getAllByIdProject($idProyecto);

    $resultado = [];

    foreach ($beneficiarios as $beneficiario) {
        $resultado[] = [
            'name' => $beneficiario->getsName(),
            'description' => $beneficiario->getsDescription()
        ];
    }

    header('Content-Type: application/json');
    echo json_encode($resultado);
}
?>