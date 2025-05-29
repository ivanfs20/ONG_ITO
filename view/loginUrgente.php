<?php
/*************************************************************/
/* Archivo:  loginUrgente.php
 * Objetivo: Pagina para mostrarse en dado caso que un usuario que no este logeado quiera donar, pero es un requisito que este registrado 
 * o inicie sesion.
 * Autor: Edwin Ariel Ramos 
 *************************************************************/
$customStyles = '<link rel="stylesheet" href="../view/css/vistas/loginUrgente.css">'; #cargamos el estilo en especifico de error.php
$customScript = '<script src="../view/js/script1.js"></script>'; #cargamos el script
include_once("modules/header.html");  # Incluye <head> y apertura de <body>
include_once("modules/navbar.php");   # Navbar
?>

<section class="contenedor-principal-urgente">
    <div class="contenedor-urgente">
        <h1>ADVERTENCIA!</h1>
        <h2>NECESITA REGISTRARSE O INICIAR SESION PARA ESTA ACCIÓN</h2>
    </div>
    <div class="contenedor-imagen-urgente">
        <img src="media/prohibido.jpg" alt="imagen de buho durmiendose">
    </div>
</section>

<?php
include_once("modules/footer.php"); # Footer y cierre de HTML
?>