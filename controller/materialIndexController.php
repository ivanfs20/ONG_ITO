<?php 
require_once 'model/Material.php';
$oMaterial=new Material(); 
//$arrMaterial=$oMaterial->readForTable();
$arrMaterial=$oMaterial->readByJoin();
if(count($arrMaterial)>0){
foreach ($arrMaterial as $material){

    $filePath = $material->getsNombreUser() . '.jpg';
    file_put_contents($filePath, $material -> getaPhoto());
?>

                <div class="tabla-fila">
                    <div class="celda-imagen">
                    <img src="<?php echo $filePath; ?>" alt="Imagen del proyecto" width="100" />
                        
                    </div>
                    <div class="descripcion-celda">
                         
                        <table class="tabla-datos">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Material donado</th>
                            <th>Descripcion</th>
                            <th>Cantidad</th>
                            <th>Fecha de donacion</th>
                            <th>Usuario donador</th>                         
                         </tr>
                    </thead>
                    <tr>
                        <td>
                            <?php  echo $material->getsNameBenefactor();   ?>
                        </td>
                        <td>
                            <?php  echo $material->getsName();   ?>
                        </td>

                        <td>
                            <?php  echo $material->getsDescription();   ?>
                        </td>

                        <td>
                            <?php  echo $material->getnAmount();   ?>
                        </td>

                        <td>
                            <?php  echo $material->getdFechaCreacion();   ?>
                        </td>

                        <td>
                            <?php  echo $material->getsNombreUser();   ?>
                        </td>
                    </tr>
                    
                </table>
                       
                    </div>
                </div>
                
<?php 
}
}else{
?>
<h3 class="seccion-titulo">No hay donacion en este periodo :(</h3>
<?php 
}
?>