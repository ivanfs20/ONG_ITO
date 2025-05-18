<?php
/*************************************************************/
/* Archivo:  gestiondedonaciones.php
 * Objetivo: Menu de los tipos de donaciones
 * Autor: Uriel Vallejo Xicalhua
 *************************************************************/
$customStyles = '<link rel="stylesheet" href="../view/css/vistas/gestiondedonaciones.css">'; #cargamos el estilo en especifico de contacto.php
include_once("modules/header.html");  # Incluye <head> y apertura de <body>
include_once("modules/navbar.php");   # Navbar

?>


    <div class="banner">
        Gestion de Donaciones
    </div>

    <div class="container">
        <h2>Donaciones</h2>
        <div class="cards">
            <div class="card">
                <img src="https://via.placeholder.com/280x150?text=Donaciones" alt="Donaciones">
                <p>Pagos con tarjeta</p>
                <a href="gestiondigital.php">Donacion Dinero →</a>
            </div>
            <div class="card">
                <img src="https://via.placeholder.com/280x150?text=Proyectos" alt="Proyectos">
                <p>Recursos resividos</p>
                <a href="gestionmaterial.php">Donacion Recurso →</a>
            </div>
        </div>

    </div>


<?php
include_once("modules/footer.html"); # Footer y cierre de HTML
?>