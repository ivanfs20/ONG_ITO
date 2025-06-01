<?php
/*************************************************************/
/* Archivo:  D31_TipoTarjeta.php
 * Objetivo: Tercera fase para seguir el proceso de donacion, es decir, la fase donde se ingresa el monto
 * Autor: Edwin Ariel Ramos 
 *************************************************************/
$customStyles = '<link rel="stylesheet" href="../view/css/vistas/D31_TipoTarjeta.css">'; #cargamos el estilo en especifico de D31_TipoTarjeta.php
$customScript = '<script src="../view/js/script1.js"></script>'; #cargamos el script
include_once("modules/header.html");  # Incluye <head> y apertura de <body>
//include_once("modules/navbar.php");   # Navbar
require_once '../model/Usuario.php';
require_once '../model/Digital.php';
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
$oDigital=new Digital();
$beneficiario=$_POST['beneficiario'];
date_default_timezone_set("America/Mexico_City");
$fecha=date('Y-m-d');
$folio=0;
    do {
        $folio = rand(100000, 999999); 
    } while ($oDigital->existsFolio($folio)); 
if($oUsuario!=null){
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


<!-- #Seccion datos de la operacion -->
<section class="Seccion-operacion">
    <form action="D41_ConfirmarTarjeta.php"  method="POST">
        <input name="folio" type="hidden" id="folio"  value="<?php  echo $folio; ?>">
        <input name="nombre" type="hidden" id="nombre"  value="<?php echo $oUsuario->getsNombreC();  ?>">
        <input name="fecha" type="hidden" id="fecha"  value="<?php echo $fecha;  ?>">
        <input name="beneficiario" type="hidden" id="beneficiario"  value="<?php echo $beneficiario;  ?>">

    <div class="contenedor-operacion">
        <div class="contenido-operacion">
            <h2 class="titulo-operacion">Monto a donar</h2>
            <input name="monto-total" type="number" id="monto-donacion" class="input-simple" placeholder="Ingresa el monto" min="1"
                required>
        </div>
    </div>
</section>


<!-- Sección de continuación -->
<section class="seccion-continuar">
    <div class="contenedor-continuar">
        <div class="contenido-continuar">
            <button class="boton-continuar3" type="submit">
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