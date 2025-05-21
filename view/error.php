<?php
/*************************************************************/
/* Archivo:  error.php
 * Objetivo: Pagina para mostrarse en dado caso de un error
 * Autor: Edwin Ariel Ramos 
 *************************************************************/
$customStyles = '<link rel="stylesheet" href="../view/css/vistas/error.css">'; #cargamos el estilo en especifico de error.php
$customScript = '<script src="../view/js/script1.js"></script>'; #cargamos el script
include_once("modules/header.html");  # Incluye <head> y apertura de <body>
include_once("modules/navbar.php");   # Navbar
?>

<section class="contenedor-principal-error">
    <div class="contenedor-error">
        <h1>Oops!</h1>
        <h2>ERROR, PAGINA NO ENCONTRADA</h2>
    </div>
    <div class="contenedor-imagen-error">
        <img src="media/polluelo.gif" alt="imagen de buho durmiendose">
    </div>
</section>

<?php
include_once("modules/footer.html"); # Footer y cierre de HTML
?>