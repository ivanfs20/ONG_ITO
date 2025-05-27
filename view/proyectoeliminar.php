<?php
/*************************************************************/
/* Archivo:  proyectoeliminar.php
 * Objetivo: Eliminar campo de un proyecto
 * Autor: Uriel Vallejo Xicalhua
 *************************************************************/
$customStyles = '<link rel="stylesheet" href="../view/css/vistas/proyectoeliminar.css">'; #cargamos el estilo en especifico de proyectoeliminar.php
$customScript = '<script src="../view/js/script1.js"></script>'; #cargamos el script
include_once("modules/header.html");  # Incluye <head> y apertura de <body>
include_once("modules/navbar.php");   # Navbar
require_once '../model/Usuario.php';

require_once '../model/Proyecto.php';



$idProyecto = $_GET["idProyecto"];

            $oProyecto = new Proyecto();
            $oProyecto = $oProyecto -> getById($idProyecto);


session_start();
if (isset($_SESSION['usuario'])) {
    $oUsuario = $_SESSION["usuario"];
} else {
    $oUsuario = null;
}

if($oUsuario!=null && $oUsuario->getsRol()=="administrador"){
?>


<div class="header">Eliminar Proyecto</div>

<div class="container">


    <form action="../controller/proyectoEliminado.php" method="POST">

    <label for="id_proyecto">Id Proyecto:</label>
        <input name="id_proyecto" type="text" id="id_proyecto" value=<?php echo $oProyecto->getnIdProyecto();?> readonly>

        <label for="id_titulo">Titulo:</label>
        <input name="titulo" type="text"  id=" id_titulo " value="<?php echo htmlspecialchars($oProyecto->getsTitle()); ?>" readonly> 

        <label for="id_dscripcion">Descripcion:</label>
        <input name="descripcion" type="text"  id=" id_titulo " value="<?php echo htmlspecialchars($oProyecto->getsDescription());?>" readonly>

        <?php
                                $imagenBinaria = $oProyecto->getaPhoto();
                                $base64Image = base64_encode($imagenBinaria);
                                $imgSrc = 'data:image/jpeg;base64,' . $base64Image;
        ?>

<label for="id_foto">Foto:</label>

        <img src="<?php echo $imgSrc; ?>" alt="Imagen del proyecto" width="100" />

        <?php
        
        ?>

        <label for="id_foto">Id Usuario:</label>
        <input name="id_usuario" type="text"  id=" id_titulo " value=<?php echo $oProyecto->getnIdUsuario();?> readonly>

        <label for="id_foto">ID Beneficiario:</label>
        <input name="id_benefactor" type="text"  id=" id_titulo " value=<?php echo $oProyecto->getnIdBenefactor();?> readonly>


        <div>
        <button class="button">Confirmar</button>

</div>
       


<?php
include_once("modules/footer.html"); # Footer y cierre de HTML
}
?>