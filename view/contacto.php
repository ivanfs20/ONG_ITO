<?php
/*************************************************************/
/* Archivo:  contacto.php
 * Objetivo: Pagina en donde el usuario puede mantener contacto con nuestra ONG y ver 
 * la ubicacion de nuestras instalaciones
 * Autor: Edwin Ariel Ramos Alvarez
 *************************************************************/
$customStyles = '<link rel="stylesheet" href="../view/css/vistas/contacto.css">'; #cargamos el estilo en especifico de contacto.php
$customScript = '<script src="../view/js/script1.js"></script>'; #cargamos el script
include_once("modules/header.html");  # Incluye <head> y apertura de <body>
include_once("modules/navbar.php");   # Navbar
?>


<!-- #HERO SECTION -->
<section class="hero">
    <div class="hero-contenido">
        <h1 class="hero-titulo">Ponte en contacto con nosotros</h1>
        <p class="hero-subtitulo">Última actualización: 30/04/2025</p>
    </div>
</section>


<!-- oicina en el mundo -->
<section class="seccion-oficina">
    <h2 class="titulo-seccion">Nuestra oficina en el mundo</h2>

    <!-- mapa -->
    <div class="contenedor-mapa">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3775.706804579352!2d-97.10078602607392!3d18.85570005885407!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85c502aeb2d35fed%3A0xba5f3840b0862949!2sTecNM%20-%20Campus%20Orizaba!5e0!3m2!1ses!2smx!4v1747188947301!5m2!1ses!2smx"
            width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>

    <!-- texto aclaratorio -->
    <p class="texto-aclaracion">
        Si tienes dudas, quieres colaborar o necesitas apoyo, no dudes en escribirnos o llamarnos. Estamos para
        ayudarte.
    </p>

    <!-- info de contacto -->
    <div class="tarjeta">
        <h3>Donativos ITOrizaba</h3>
        <ul>
            <li>📞 Teléfono: +52 272 296 4479</li>
            <li>✉️ Correo electrónico: donativositorizaba@gmail.com</li>
            <li>📍 Dirección física: Ote. 9 #852, Emiliano Zapata, 94320 Orizaba, Ver.</li>
            <li>🕐 Horario de atención: Lunes a viernes, 9:00 a.m. – 3:00 p.m.</li>
        </ul>
    </div>

    <!-- redes sociales -->
    <div class="tarjeta">
        <h3>Redes sociales:</h3>
        <ul>
            <li>📘 Sitio web: <a href="http://orizaba.tecnm.mx/itocc/">Pagina oficial</a></li>
            <li>📘 Facebook: [NombreDeUsuario o enlace futuro]</li>
            <li>📸 Instagram: [NombreDeUsuario o enlace futuro]</li>
            <li>📱 WhatsApp: <a href="https://wa.me/52272XXXXXXX">https://wa.me/52272XXXXXXX</a></li>
        </ul>
    </div>
</section>


<?php
include_once("modules/footer.php"); # Footer y cierre de HTML
?>