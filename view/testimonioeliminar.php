<?php
/*************************************************************/
/* Archivo:  testimonioeliminar.php
 * Objetivo: Eliminar campo de un Indicio
 * Autor: Uriel Vallejo Xicalhua
 *************************************************************/
$customStyles = '<link rel="stylesheet" href="../view/css/vistas/testimonioeliminar.css">'; #cargamos el estilo en especifico de testimonioeliminar.php
$customScript = '<script src="../view/js/script1.js"></script>'; #cargamos el script
include_once("modules/header.html");  # Incluye <head> y apertura de <body>
include_once("modules/navbar.php");   # Navbar

?>


<div class="header">Eliminar Testimonio</div>

<div class="container">
   

    <form>
        
        <label for="id_testimonio">Id Testimonio:</label>
        <input name="id_testimonio" type="text" id="id_testimonio" >

        <label for="testimonio">Testimonio:</label>
        <input name="testimonio" type="text"  id=" testimonio ">

        <label for="id_nombre">Nombre:</label>
        <input name="id_nombre" type="text"  id=" id_nombre">

        <label for="id_carrera">Carrera:</label>
        <input name="id_carrera" type="text"  id=" id_carrera">

   <div>
        <button class="button">Confirmar</button>

</div>
       


<?php
include_once("modules/footer.php"); # Footer y cierre de HTML
?>