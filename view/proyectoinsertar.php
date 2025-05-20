<?php
/*************************************************************/
/* Archivo:  proyectoinsertar.php
 * Objetivo: Insertar campo de un proyecto
 * Autor: Uriel Vallejo Xicalhua
 *************************************************************/
$customStyles = '<link rel="stylesheet" href="../view/css/vistas/proyectoinsertar.css">'; #cargamos el estilo en especifico de proyectoinsertar.php
$customScript = '<script src="../view/js/script1.js"></script>'; #cargamos el script
include_once("modules/header.html");  # Incluye <head> y apertura de <body>
include_once("modules/navbar.php");   # Navbar

?>


<div class="header">Insertar Proyecto</div>

<div class="container">
    <table>
        <tr>
            <th>Id Proyecto</th>
            <th>Titulo</th>
            <th>Descripción</th>
            <th>Foto</th>
        </tr>
    </table>

    <form>
        <label for="id_proyecto">Id Proyecto:</label>
        <input name="id_proyecto" type="text" id="id_proyecto" >

        <label for="id_titulo">Titulo:</label>
        <input name="titulo" type="text"  id=" id_titulo " >

        <label for="id_dscripcion">Descripcion:</label>
        <input name="descripcion" type="text"  id=" id_titulo ">

        <label for="id_foto">Foto:</label>
        <input name="foto" type="text"  id=" id_titulo ">

        <div>
        <button class="button">Confirmar</button>

</div>
       


<?php
include_once("modules/footer.html"); # Footer y cierre de HTML
?>