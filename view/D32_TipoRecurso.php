<?php
/*************************************************************/
/* Archivo:  D2_Donar.php
 * Objetivo: Segunda fase para seguir el proceso de donacion, en este caso seleccionar el tipp de recurso
 * Autor: Edwin Ariel Ramos 
 *************************************************************/
$customStyles = '<link rel="stylesheet" href="../view/css/vistas/D32_TipoRecurso.css">'; #cargamos el estilo en especifico de D1_Area.php
$customScript = '<script src="../view/js/script1.js"></script>'; #cargamos el script
include_once("modules/header.html");  # Incluye <head> y apertura de <body>
include_once("modules/navbar.php");   # Navbar
require_once '../model/Usuario.php';
session_start();
$bRes = false;

if (isset($_SESSION['usuario'])) {
    $oUsuario = $_SESSION["usuario"];
    $bRes = true;

} else {
    $oUsuario = null;
    $bRes = false;

}

if ($oUsuario != null) {
    ?>

    <!-- #Seccion tipo Hero que actua como menu para seguir los pasos -->
    <section class="hero">
        <div class="hero-contenido">
            <h1 class="hero-titulo">Describe tu donación: ¡Tu generosidad puede ser la chispa que encienda nuevas
                oportunidades!
            </h1>
            <p class="hero-subtitulo">
                <span class="paso-inactivo">1</span>
                <span class="paso-inactivo">2</span>
                <span class="paso-activo">3</span>
                <span class="paso-inactivo">4</span>
            </p>
        </div>
    </section>

    <!-- Formulatio para describir el tipo de la donacion, el recurso y como van a ser los elementos -->
    <!-- Formulario para describir la donación -->
    <section class="seccion-formulario">
        <div class="contenedor-formulario">
            <form class="formulario-donacion" action="D42_ConfirmarRecurso.php" method="POST" > 
                <input type="hidden" name="nbeneficiario" value="<?php echo isset($_POST['beneficiario']) ? htmlspecialchars($_POST['beneficiario']) : ''; ?>">
                  
                <div class="grupo-formulario">
                    <label for="nombre-recurso" class="etiqueta">Nombre del recurso</label>
                    <input name="recurso" type="text" id="nombre-recurso" class="input-formulario"
                        placeholder="Ejemplo: Silla ergonómica, Multímetro digital" required>
                </div>

                <div class="grupo-formulario">
                    <label for="descripcion" class="etiqueta">Descripción del recurso</label>
                    <textarea id="descripcion" class="textarea-formulario" rows="4" name="descripcion"
                        placeholder="Describe las características y condición del artículo" required></textarea>
                </div>

                <div class="grupo-formulario">
                    <label for="cantidad-recurso" class="etiqueta">Cantidad del recurso</label>
                    <input name="cantidad-recurso" type="number" id="cantidad-recurso" class="input-formulario"
                        placeholder="Ingrese la cantidad de su recurso" required>
                </div>


                <div class="grupo-formulario">
                    <label class="etiqueta">Imagen del recurso (opcional)</label>
                    <div class="contenedor-archivo">
                        <input name="imagen-r" type="file" id="imagen-recurso" class="input-archivo" accept="image/*" >
                        <label for="imagen-recurso" class="etiqueta-archivo">
                            <span class="texto-archivo">Subir imagen</span>
                        </label>
                    </div>
                </div>
            <!--</form> -->
        </div>
    </section>

    <!-- Sección de continuación -->
    <section class="seccion-continuar">
        <div class="contenedor-continuar">
            <div class="contenido-continuar">
                <button type="submit" class="boton-continuar3">
                    
                        CONTINUAR
                    
                </button>
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