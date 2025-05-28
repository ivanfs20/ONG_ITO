<?php
/*************************************************************/
/* Archivo:  gestionmaterial.php
 * Objetivo: Menu de los tipos de donaciones
 * Autor: Uriel Vallejo Xicalhua
 *************************************************************/
$customStyles = '<link rel="stylesheet" href="../view/css/vistas/gestionmaterial.css">'; #cargamos el estilo en especifico de material.php
$customScript = '<script src="../view/js/script1.js"></script>'; #cargamos el script
include_once("modules/header.html");  # Incluye <head> y apertura de <body>
include_once("modules/navbar.php");   # Navbar
require_once '../model/Usuario.php';
session_start();
if (isset($_SESSION['usuario'])) {
    $oUsuario = $_SESSION["usuario"];
} else {
    $oUsuario = null;
}

if ($oUsuario != null && $oUsuario->getsRol() == "administrador") {
    ?>

    <div class="header">
        Recursos Donados
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Id material</th>
                    <th>Cantidad</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Imagen</th>
                    <th>Id usuario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
             <?php
require_once '../model/Material.php';
$oMaterial=new Material();
$arrMaterial=$oMaterial->readMaterialFalse();
foreach ($arrMaterial as $material){
    $imagenBinaria = $material->getaPhoto();
    $base64Image = base64_encode($imagenBinaria);
    $imgSrc = 'data:image/jpeg;base64,' . $base64Image
?>
<form action="../controller/materialConfirmarController.php" method="POST">
            <tbody>
                <tr>
                    <td> <input name="idDonacion" type="text" id="id_donacion" value="<?php echo $material->getnIdDonacion();  ?>" readonly> </td>    
                    <td><?php echo $material->getnAmount();   ?></td>
                    <td><?php echo $material->getsName();?></td>
                    <td><?php echo  $material->getsDescription(); ?></td>
                    <td>Pendiente de confirmacion</td>
                    <td><img src="<?php echo $imgSrc; ?>" alt="Imagen del material" width="100" /></td>
                    <td><?php echo $material->getnIdUsuario(); ?></td>
                    <td><button class="btn-eliminar">Confirmar</button></td>
                </tr>
            </tbody>
</form>
<?php } ?>

        </table>

        <div>
            <a href="gestiondedonaciones.php" class="boton-regresar">Regresar</a>
        </div>
    </div>


    <?php
    include_once("modules/footer.html"); # Footer y cierre de HTML
}
?>