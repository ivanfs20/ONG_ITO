
<?php
/*************************************************************/
/* Archivo:  usuarioperfil.php
 * Objetivo: usuarioperfil
 * Autor: Uriel Vallejo Xicalhua
 *************************************************************/
$customStyles = '<link rel="stylesheet" href="../view/css/vistas/usuarioperfil.css">'; #cargamos el estilo en especifico de usuarioperfil.php
$customScript = '<script src="../view/js/script1.js"></script>'; #cargamos el script
include_once("modules/header.html");  # Incluye <head> y apertura de <body>
include_once("modules/navbar.php");   # Navbar

include_once("../model/Usuario.php");
session_start();
$bSession = false;
if (isset($_SESSION['usuario'])) {
  $oUsuario = $_SESSION["usuario"];
  $bSession = true;
  $nombre="Donador";

} else {
  $oUsuario = null;
  $bSession = false;
} 


if ($oUsuario != null) {

?>


<div class="banner">
Mi perfil  </div>


<div class="main-container">
    
  <div class="profile-content">
    <h2>Perfil de Usuario:</h2>
    <label for="nombre">Nombre:</label><br>
    <input type="text" id="nombre" name="nombre" value='<?php echo  $oUsuario->getsNombreC();  ?>' readonly><br><br>

    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" value='<?php echo  $oUsuario->getsEmail();  ?>' readonly><br>
  </div>
  <?php
include_once("modules/aside.html"); # Aside
?>
  </div>
<?php
}{

  if($bSession == false){
    include_once("loginUrgente.php");
  }
}
include_once("modules/footer.php"); # Footer y cierre de HTML
?>
