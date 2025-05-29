<?php
/*************************************************************/
/* Archivo:  gestiondigital.php
 * Objetivo: Tabla donaciones digitales
 * Autor: Uriel Vallejo Xicalhua
 *************************************************************/
$customStyles = '<link rel="stylesheet" href="../view/css/vistas/gestiondeproyecto.css">'; #cargamos el estilo en especifico de gestiondigital.php
$customScript = '<script src="../view/js/script1.js"></script>'; #cargamos el script
include_once("modules/header.html");  # Incluye <head> y apertura de <body>
include_once("modules/navbar.php");   # Navbar
require_once '../model/Usuario.php';
require_once '../model/Proyecto.php';
require_once '../model/Beneficiario.php';

session_start();
if (isset($_SESSION['usuario'])) {
    $oUsuario = $_SESSION["usuario"];
} else {
    $oUsuario = null;
}

if ($oUsuario != null && $oUsuario->getsRol() == "administrador") {
    ?>

    <div class="header">
        Gestion de Proyecto
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Id Proyecto</th>
                    <th>Titulo</th>
                    <th>Descripcion</th>
                    <th>Foto</th>
                    <th>Id Administrador</th>

                </tr>
            </thead>
            <tbody>

                <?php
                $oProyecto = new Proyecto();
                $arrProyectos = $oProyecto->readAll();

                foreach ($arrProyectos as $oProyect) {

                    $imagenBinaria = $oProyect->getaPhoto();
                    $base64Image = base64_encode($imagenBinaria);
                    $imgSrc = 'data:image/jpeg;base64,' . $base64Image;


                    ?>

                    <tr>
                        <td><?php echo $oProyect->getnIdProyecto(); ?></td>
                        <td><?php echo $oProyect->getsTitle(); ?></td>
                        <td><?php echo $oProyect->getsDescription(); ?></td>
                        <td><img src="<?php echo $imgSrc; ?>" alt="Imagen del proyecto" width="100" /></td>
                        <td><?php echo $oProyect->getnIdUsuario(); ?></td>
                        <td>
                            <button
                                onclick="window.location.href='proyectomodificar.php?idProyecto=<?php echo $oProyect->getnIdProyecto(); ?>'"
                                class="btn-modificar">Modificar</button>
                            <button
                                onclick="window.location.href='proyectoeliminar.php?idProyecto=<?php echo $oProyect->getnIdProyecto(); ?>'"
                                class="btn-eliminar">Eliminar</button>
                        </td>


                    </tr>

                    <?php
                }
                ?>
            </tbody>
        </table>


        <button onclick="window.location.href='proyectoinsertar.php'" class="btn-insertar">Insertar</button>
        <div>
            <a href="gestionpb.php" class="boton-regresar">Regresar</a>
        </div>
    </div>


    <div>
            <a href="gestionpb.php" class="boton-regresar">Regresar</a>
        </div>

    <?php
    include_once("modules/footer.php"); # Footer y cierre de HTML
}
?>