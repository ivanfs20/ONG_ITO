<?php
/*************************************************************/
/* Archivo:  benefactorinsertar.php
 * Objetivo: Insertar campo de un benefactor
 * Autor: Uriel Vallejo Xicalhua
 *************************************************************/
$customStyles = '<link rel="stylesheet" href="../view/css/vistas/benefactorinsertar.css">'; #cargamos el estilo en especifico de benefactorinsertar.php
$customScript = '<script src="../view/js/script1.js"></script>'; #cargamos el script
include_once("modules/header.html");  # Incluye <head> y apertura de <body>
include_once("modules/navbar.php");   # Navbar

?>


<div class="header">Insertar Benefactor</div>

<div class="container">
    <table>
        <tr>
            <th>Id Proyecto</th>
            <th>Titulo</th>
            <th>Descripción</th>
        </tr>
    </table>

    <form>
     
    <label for="id_benefactor">Id Benefactor:</label>
        <input name="id_pro" type="text" id="id_proyecto" >

        <label for="id_titulo">Titulo:</label>
        <input name="titulo" type="text"  id=" id_titulo ">

        <label for="id_dscripcion">Descripcion:</label>
        <input name="descripcion" type="text"  id=" id_dscripcion">

   <div>
        <button class="button">Confirmar</button>

</div>
       


<?php
include_once("modules/footer.html"); # Footer y cierre de HTML
?>