<?php
require_once '../model/Digital.php';
$oDigital=new Digital();
date_default_timezone_set('America/Mexico_City');
$fechaFin = new DateTime(); 
$fechaInicio = (clone $fechaFin)->modify('-1 month');
$arrDigital=$oDigital->readByJoin();
$acumulador=0;
$countFolio = 0;
foreach ($arrDigital as $digital){
    if($digital->getbStatus() == 1){
?>
   <tr>
             <td><?php echo $digital->getsNombreUser();?></td>  
             <td><?php echo '$'.$digital->getnAmount().'.00 MXN';?></td>
             <td><?php echo $digital->getnFolio(); ?></td> 
             <td><?php  echo $digital->getdFechaCreacion(); ?></td>           
    </tr>
<?php 
    $countFolio++;
    $acumulador+=$digital->getnAmount();
    }
}
?>
<tr>
    <th>
     Total
    </th>
    <th>
        <?php echo '$'.$acumulador.'.00 MXN'; ?>
    </th>
    <th>
        <?php 

            echo $countFolio.' folios totales';

        ?>
    </th>
    <th>
       <?php  echo "Periodo " . $fechaInicio->format('Y-m-d') . " a " . $fechaFin->format('Y-m-d'); ?>

    </th>
</tr>