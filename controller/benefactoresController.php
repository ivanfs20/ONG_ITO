<?php
    include("../model/Benefactor.php");

    $oBenefactor = new Benefactor();
    $arrBenefactores = $oBenefactor -> getAll();

    foreach($arrBenefactores as $benefactor){
?>
    <div class="areas-grid">
            <!-- Columna de Imagen -->
            <div class="area-imagen">
                <img src="media/porque.jpg" alt="Estudiantes en laboratorio">
            </div>

            <!-- Columna de Texto -->
            <div class="area-content">
                <h2 class="area-titulo"><?php echo $benefactor -> getsName() ; ?></h2>
                <p class="area-texto">
                <?php echo $benefactor -> getsDescription() ; ?>
                </p>
                <a href="campanas.php" class="area-boton">Ver campañas similares</a>
            </div>
        </div>
        <br>
<?php
    }
?>