<?php
    include_once("../model/Beneficiario.php");

    $oBenefactor = new Beneficiario();
    $arrBenefactores = $oBenefactor -> getAll();

    if($arrBenefactores!=null){
    foreach($arrBenefactores as $benefactor){
?>
    <div class="areas-grid">
            <!-- Columna de Imagen -->
            <div class="area-imagen">
                <img src="media/buho.png" alt="Estudiantes en laboratorio">
            </div>

            <!-- Columna de Texto -->
            <div class="area-content">
                <h2 class="area-titulo"><?php echo $benefactor -> getsName() ; ?></h2>
                <p class="area-texto">
                <?php echo $benefactor -> getsDescription() ; ?>
                </p>
                <a href="campanas.php" class="area-boton">Ver m&aacute;s</a>
            </div>
        </div>
<?php
    }
}
?>