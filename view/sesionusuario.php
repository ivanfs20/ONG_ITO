<?php
/*************************************************************/
/* Archivo:  sesionusuario.php
 * Objetivo: Menu principal de un usuario
 * Autor: Uriel Vallejo Xicalhua
 *************************************************************/
$customStyles = '<link rel="stylesheet" href="../view/css/vistas/sesionusuario.css">'; #cargamos el estilo en especifico de sesionusuario.php
$customScript = '<script src="../view/js/script1.js"></script>'; #cargamos el script
include_once("modules/header.html");  # Incluye <head> y apertura de <body>
//include_once("modules/navbar.php");   # Navbar
include_once("../model/Usuario.php");
require_once '../model/Proyecto.php';
session_start();
require_once '../navbar2.php';
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
¡Bienvenido, <?php echo  $oUsuario->getsNombreC();  ?>    </div>

    
  </header>

 <!-- <button class="donate-btn">¡Donar!</button> 
-->
  <main class="main-container">

    <?php
include_once("modules/aside.html"); # Aside
$oProyecto=new Proyecto();
$arrProjects=$oProyecto->readFirstFive();
$contador=1;

?>

    <section class="recommendations">
      <h2>Recomendadas para ti:</h2>

      <?php
      foreach ($arrProjects as $project){
          $imagenBinaria = $project->getaPhoto();
          $base64Image = base64_encode($imagenBinaria);
          $imgSrc = 'data:image/jpeg;base64,' . $base64Image;
      ?> 
      <div class="card">
       <img src="<?php echo $imgSrc; ?>" alt="Imagen de la campaña" width="100" />
        <div>
          <h3><?php echo $contador.'.-'.$project->getsTitle();  ?></h3>
          <p><?php echo $project->getsDescription(); ?></p>
          <button class="donate-btn" onclick="window.location.href='campanas.php'">Ver campaña solidaria</button>
        </div>
      </div>
  <?php   $contador++; } ?>
    </section>
  </main>


  <footer class="footer">
    <p>Gracias por ser parte del cambio, <span class="username"><?php  echo $oUsuario->getsNombreC();?></span>. Cada donación tuya deja una huella real. ¿Nos ayudas una vez más a transformar vidas?</p>
    <button class="donate-btn">Seguir colaborando</button>
  </footer>

<?php
}{
  if($bSession == false){
    include_once("loginUrgente.php");
  }
}
include_once("modules/footer.php"); # Footer y cierre de HTML

?>
