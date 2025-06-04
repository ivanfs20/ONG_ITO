
<?php
/*************************************************************/
/* Archivo:  usuariodonaciones.php
 * Objetivo: donaciones de un usuario
 * Autor: Uriel Vallejo Xicalhua
 *************************************************************/
$customStyles = '<link rel="stylesheet" href="../view/css/vistas/usuariodonaciones.css">'; #cargamos el estilo en especifico de usuariodonaciones.php
$customScript = '<script src="../view/js/script1.js"></script>'; #cargamos el script
include_once("modules/header.html");  # Incluye <head> y apertura de <body>
//include_once("modules/navbar.php");   # Navbar
include_once("../model/Usuario.php");
include_once("../model/Digital.php");
include_once("../model/Material.php");

session_start();
$bSession = false;
if (isset($_SESSION['usuario'])) {
  $oUsuario = $_SESSION["usuario"];
  $bSession = true;
  $nombre="Donador";
  require_once '../navbar2.php';

} else {
  $oUsuario = null;
  $bSession = false;
  require_once 'modules/navbar.php';
} 

if ($oUsuario != null) {

  $oMaterial = new Material();
  $oDigital = new Digital();
  $oMaterial -> setnIdUsuario($oUsuario->getnIdUsuario());
  $arrDonacionesMateriales = $oMaterial -> getDonacionMaterial();
  $oDigital -> setnIdUsuario($oUsuario->getnIdUsuario());
  $arrDonacionesDigitales = $oDigital -> getDonacionDigital();

?>



<div class="banner">
Mis donaciones </div>

<main class="main-container">
   
<?php
include_once("modules/aside.html"); # Aside
?>
  <section>
    <h2>Donaciones:</h2>
    <h3>Donaciones de recursos:</h3>
    <table>
      <tr>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Cantidad</th>
        <th>Beneficiario</th>
        <th>Evidencia</th>
        <th>Estado</th>
      </tr>
      <?php
        foreach($arrDonacionesMateriales as $oDonacionMat){

          
          $imagenBinaria = $oDonacionMat->getaPhoto();
          $base64Image = base64_encode($imagenBinaria);
          $imgSrc = 'data:image/jpeg;base64,' . $base64Image;
      ?>
      <tr>

      
        <td><?php echo $oDonacionMat->getsName();?></td>
        <td><?php echo $oDonacionMat->getsDescription();?></td>
        <td><?php echo $oDonacionMat->getnAmount();?></td>
        <td><?php echo $oDonacionMat->getsNameBenefactor();?></td>
        <td><img src="<?php echo $imgSrc; ?>" alt="Imagen de la donación" width="100" /></td>

        <td><?php if($oDonacionMat->getbStatus()==0){
          echo "Pendiente";
          }else{
            echo "Confirmado";
          }
          ?></td>
      </tr>

      <?php
      }
      ?>
    </table>
    <label for="testm">Ingresar Testimonio:</label><br>
    <textarea type="text" id="testmaterial" name="testmaterial" ></textarea>
    <button class="test-btn">Enviar</button>
    
    <br><br>



    <h3>Donaciones de Depósito:</h3>
    <table>
      <tr>
        <th>Beneficiario</th>
        <th>Monto</th>
        <th>Folio</th>
        <th>Fecha</th>
        <th>Estado</th>
      </tr>
      <?php
        foreach($arrDonacionesDigitales as $oDonacionDig){
      ?>
      <tr>

        
      
      <tr>
      <td><?php echo $oDonacionDig->getsNameBenefactor();?></td>
        <td><?php echo $oDonacionDig->getnAmount();?></td>
        <td><?php echo $oDonacionDig->getnFolio();?></td>
        <td><?php echo $oDonacionDig->getdFechaCreacion();?></td>
        <td><?php if($oDonacionDig->getbStatus()==0){
          echo "Pendiente";
          }else{
            echo "Confirmado";
          }
          
          ?></td>
      </tr>
      
      <?php
      }
      ?>
      
    </table>
    <label for="testd">Ingresar Testimonio:</label><br>
    <textarea type="text" id="testdigital" name="testdigital" ></textarea>
    <button class="test-btn">Enviar</button>
    
    <br><br>

    </section>
    </main>



<?php
}{
  if($bSession == false){
    include_once("loginUrgente.php");
  }
}
include_once("modules/footer.php"); # Footer y cierre de HTML
?>
