<?php
/*************************************************************/
/* Archivo:  D42_ConfirmarRecurso.php
 * Objetivo: Segunda fase para seguir el proceso de donacion, en este caso seleccionar el tipp de recurso
 * Autor: Edwin Ariel Ramos 
 *************************************************************/
$customStyles = '<link rel="stylesheet" href="../view/css/vistas/D42_ConfirmarRecurso.css">'; #cargamos el estilo en especifico de D41_ConfirmarTarjeta.php
$customScript = '<script src="../view/js/script1.js"></script>'; #cargamos el script
include_once("modules/header.html");  # Incluye <head> y apertura de <body>
//include_once("modules/navbar.php");   # Navbar
require_once '../model/Usuario.php';
session_start();
$bRes = false;

if (isset($_SESSION['usuario'])) {
    $oUsuario = $_SESSION["usuario"];
    $bRes = true;
    require_once '../navbar2.php';
} else {
    $oUsuario = null;
    $bRes = false;
    require_once 'modules/navbar.php';
}


$nombreRecurso=$_POST['recurso'];
$nombreBeneficiario = isset($_POST['nbeneficiario']) ? htmlspecialchars($_POST['nbeneficiario']) : '';
$descripcionRecurso=$_POST['descripcion'];
$cantidadRecurso=$_POST['cantidad-recurso'];


    if (isset($_FILES["imagen-r"]) && $_FILES["imagen-r"]["error"] == 0) {
    $rutaTemporal = $_FILES["imagen-r"]["tmp_name"];
    $photoData = file_get_contents($rutaTemporal);
    $photoBase64 = base64_encode($photoData);
}

if ($oUsuario != null) {
    ?>

    <!-- #Seccion tipo Hero que actua como menu para seguir los pasos -->
    <section class="hero">
        <div class="hero-contenido">
            <h1 class="hero-titulo">¡Estás a punto de hacer una diferencia real! Solo un clic más para compartir tu ayuda.
            </h1>
            <p class="hero-subtitulo">
                <span class="paso-inactivo">1</span>
                <span class="paso-inactivo">2</span>
                <span class="paso-inactivo">3</span>
                <span class="paso-activo">4</span>
            </p>
        </div>
    </section>


    <div class="contenedor-select">
        <select id="tipo-donacion" class="select-estilizado" required>
            <option value="" disabled>Selecciona una opción</option>
            <option value="recurso" selected>Recurso (Herramienta, material o equipo)</option>
        </select>
    </div>

    <!-- Seccion para formulariio -->
    <div class="contenedor-formularios">
        <!-- Formulario para recurso -->
        <form id="formulario-recurso" class="formulario-donacion" action="../controller/materialDonarController.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id_usuario" value="<?php echo $oUsuario->getnIdUsuario(); ?>">
            <input type="hidden" name="photo-data" value="<?php echo isset($photoBase64) ? $photoBase64 : ''; ?>">           
            <div class="grupo-formulario">
                <label for="nombre-beneficiario">Beneficiario a donar:</label>
                <input name="nombre-beneficiario" type="text" id="nombre-beneficiario"
                       value="<?php  echo $nombreBeneficiario; ?>" readonly>
            </div>
            <div class="grupo-formulario">
                <label for="nombre-recurso">Nombre del recurso</label>
                <input name="nombre-recurso" type="text" id="nombre-recurso"
                    placeholder="Ejemplo: Silla ergonómica, Multímetro digital"   value="<?php  echo $nombreRecurso; ?>" readonly>
            </div>

            <div class="grupo-formulario">
                <label for="descripcion">Descripción del recurso</label>
                <textarea name="descripcion-recurso" id="descripcion"  readonly> <?php  echo $descripcionRecurso; ?> </textarea>
            </div>

            <div class="grupo-formulario">
                <label for="cantidad-recurso" class="etiqueta">Cantidad del recurso</label>
                <input name="cantidad-del-recurso" type="number" id="cantidad-recurso" class="input-formulario"
                    placeholder="Ingrese la cantidad de su recurso"  value="<?php  echo $cantidadRecurso; ?>"   readonly>
            </div>
    <?php if (!empty($photoBase64)) {  ?>
            <div class="grupo-formulario">
        <label class="etiqueta">Vista previa de la imagen:</label>
        <img src="data:image/jpeg;base64,<?php echo $photoBase64; ?>" alt="Vista previa" width="200">
    </div>
            <?php } ?>
           <!-- <div class="grupo-formulario">
                <label class="etiqueta">Imagen del recurso (opcional)</label>
                <div class="subida-archivo">
                    <input name="imagen-r" type="file" id="imagen-recurso" accept="image/*" readonly>
                    <label for="imagen-recurso" class="etiqueta-archivo">
                        <span class="texto-archivo">Subir imagen</span>
                    </label>
                </div>
            </div> -->

        <!--</form>-->
    </div>


    <!-- seccion de botones, para confirmar-->
    <section class="confirmacion-donacion">
        <div class="contenedor-confirmacion">
            <div class="tarjeta-confirmacion">
                <h2 class="texto-confirmacion">¿Confirmas tu donación <?php echo $oUsuario->getsNombreC();  ?>?</h2>

                <div class="controles-confirmacion">
                    <!--<a href="agradecimiento.php" class="boton-accion confirmar">-->
                       <button type="submit" class="boton-accion confirmar"> Confirmar Donación<button>
                    <!--</a>-->

                    <a href="D1_Area.php" class="boton-accion cancelar">
                        Cancelar
                    </a>
                    <a href="D32_TipoRecurso.php" class="boton-accion regresar">
                        Regresar
                    </a>
                </div>
            </div>
        </div>
    </section>
</form>
    <?php
}{
    if($bRes == false){
        include_once("loginUrgente.php");
    }}
include_once("modules/footer.php"); # Footer y cierre de HTML
?>