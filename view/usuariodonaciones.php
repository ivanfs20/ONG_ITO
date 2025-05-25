
<?php
/*************************************************************/
/* Archivo:  usuariodonaciones.php
 * Objetivo: donaciones de un usuario
 * Autor: Uriel Vallejo Xicalhua
 *************************************************************/
$customStyles = '<link rel="stylesheet" href="../view/css/vistas/usuariodonaciones.css">'; #cargamos el estilo en especifico de usuariodonaciones.php
$customScript = '<script src="../view/js/script1.js"></script>'; #cargamos el script
include_once("modules/header.html");  # Incluye <head> y apertura de <body>
include_once("modules/navbar.php");   # Navbar

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
        <th>Imagen</th>
        <th>Benefactor</th>
        <th>Evidencia</th>
        <th>Confirmada</th>
        <th></th>
      </tr>
      <tr>
        <td>Silla</td>
        <td>png</td>
        <td>bilbiote</td>
        <td>PNG</td>
        <td>Pendiente</td>
        <td><button class="subir-btn">Subir evidencia</button></td>
      </tr>
    </table>


    <h3>Donaciones de Depósito:</h3>
    <table>
      <tr>
        <th>Monto</th>
        <th>Folio</th>
        <th>Fecha</th>
        <th>Estado</th>
        <th>Comprobante</th>
      </tr>
      <tr>
      
      <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td><button class="subir-btn">Subir evidencia</button></td>
      </tr>
    </table>
    </section>
    </main>



<?php
include_once("modules/footer.html"); # Footer y cierre de HTML
?>
