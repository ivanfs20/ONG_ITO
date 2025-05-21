<?php
/*************************************************************/
/* Archivo:  error.php
 * Objetivo: Pagina para agradecer la donacion hecha
 * Autor: Edwin Ariel Ramos 
 *************************************************************/
$customStyles = '<link rel="stylesheet" href="../view/css/vistas/agradecimiento.css">'; #cargamos el estilo en especifico de agradecimiento.php
$customScript = '<script src="../view/js/script1.js"></script>'; #cargamos el script
include_once("modules/header.html");  # Incluye <head> y apertura de <body>
include_once("modules/navbar.php");   # Navbar
?>

<section class="contenedor-agradecimiento">
    
</section>

<?php
include_once("modules/footer.html"); # Footer y cierre de HTML
?>