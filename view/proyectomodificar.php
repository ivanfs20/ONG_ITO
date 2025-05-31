<?php
/*************************************************************/
/* Archivo:  proyectomodificar.php
 * Objetivo: Modificar campo de un proyecto
 * Autor: Uriel Vallejo Xicalhua
 *************************************************************/
$customStyles = '<link rel="stylesheet" href="../view/css/vistas/proyectomodificar.css">'; #cargamos el estilo en especifico de proyectomodificar.php
$customScript = '<script src="../view/js/script1.js"></script>'; #cargamos el script
include_once("modules/header.html");  # Incluye <head> y apertura de <body>
//include_once("modules/navbar.php");   # Navbar
require_once '../model/Usuario.php';
require_once '../model/Proyecto.php';



$idProyecto = $_GET["idProyecto"];

            $oProyecto = new Proyecto();
            $oProyecto = $oProyecto -> getById($idProyecto);


session_start();
if (isset($_SESSION['usuario'])) {
    $oUsuario = $_SESSION["usuario"];
    require_once '../navbar2.php';
} else {
    $oUsuario = null;
    require_once 'modules/navbar.php';
}

if($oUsuario!=null && $oUsuario->getsRol()=="administrador"){
?>


<div class="header">Modificar Proyecto</div>

<div class="container">
   

    <form  action="../controller/proyectoModificado.php" method="POST" enctype="multipart/form-data">


        <label for="id_proyecto">Id Proyecto:</label>
        <input name="id_proyecto" type="text" id="id_proyecto" value=<?php echo $oProyecto->getnIdProyecto();?> readonly>

        <label for="id_titulo">Titulo:</label>
        <input name="titulo" type="text"  id=" id_titulo " value="<?php echo htmlspecialchars($oProyecto->getsTitle()); ?>"> 

        <label for="id_dscripcion">Descripcion:</label>
        <input name="descripcion" type="text"  id=" id_titulo " value="<?php echo htmlspecialchars($oProyecto->getsDescription());?>">

        <?php
                                $imagenBinaria = $oProyecto->getaPhoto();
                                $base64Image = base64_encode($imagenBinaria);
                                $imgSrc = 'data:image/jpeg;base64,' . $base64Image;
        ?>

        <label for="id_foto">Foto:</label>
        <input name="foto" type="file" id="id_foto" required value=<?php echo $imgSrc;?>>
        <img src="<?php echo $imgSrc; ?>" alt="Imagen del proyecto" width="100" />


        <?php
        
        ?>

        <label for="id_foto">Id Usuario:</label>
        <input name="id_usuario" type="text"  id=" id_titulo " value=<?php echo $oProyecto->getnIdUsuario();?> readonly>


        <div>
        <button class="button">Confirmar</button>

</div>
       


<?php
include_once("modules/footer.php"); # Footer y cierre de HTML
}
?>