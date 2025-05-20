<?php
/*************************************************************/
/* Archivo:  indicioeliminar.php
 * Objetivo: Eliminar campo de un Indicio
 * Autor: Uriel Vallejo Xicalhua
 *************************************************************/
$customStyles = '<link rel="stylesheet" href="../view/css/vistas/indicioeliminar.css">'; #cargamos el estilo en especifico de indicioeliminar.php
$customScript = '<script src="../view/js/script1.js"></script>'; #cargamos el script
include_once("modules/header.html");  # Incluye <head> y apertura de <body>
include_once("modules/navbar.php");   # Navbar

?>


<div class="header">Eliminar Indicios</div>

<div class="container">
    <table>
        <tr>
            <th>Id Indicio</th>
            <th>Descripcion</th>
            <th>Porcentaje</th>
        </tr>
    </table>

    <form>
        
        <label for="id_benefactor">Id Indicio:</label>
        <input name="id_indicio" type="text" id="id_benefactor" >

        <label for="id_descripcion">Descripcion:</label>
        <input name="descripcion" type="text"  id=" id_descripcion ">

        <label for="id_porcentaje">Porcentaje:</label>
        <input name="porcentaje" type="text"  id=" id_porcentaje">

   <div>
        <button class="button">Confirmar</button>

</div>
       


<?php
include_once("modules/footer.html"); # Footer y cierre de HTML
?>