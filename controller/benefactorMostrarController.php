<?php
require_once '../model/Beneficiario.php';
$oBenefactor = new Beneficiario();
$arrBenefactor = $oBenefactor->getAll();

foreach ($arrBenefactor as $benefactor) {
?>

    <tr>
        <td><?php echo  $benefactor->getnIdBenefactor();  ?></td>
        <td><?php echo $benefactor->getsName();   ?></td>
        <td><?php echo $benefactor->getsDescription();   ?></td>
        <td><?php echo $benefactor->getsNameProyecto();   ?></td>

        <td><button onclick="window.location.href='benefactormodificar.php?idBenefactor=<?php echo $benefactor->getnIdBenefactor(); ?>'" class="btn-modificar">Modificar</button>
            <button onclick="window.location.href='benefactoreliminar.php?idBenefactor=<?php echo  $benefactor->getnIdBenefactor(); ?>'" class="btn-eliminar">Eliminar</button>
        </td>
    </tr>
<?php
}
?>