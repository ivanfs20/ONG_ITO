<?php
/*************************************************************/
/* Archivo:  terminosycondiciones.php
 * Objetivo: Informacion crucial acerca de nuestros procesos y reglas que tenemos para poder llevar acabo las donaciones
 * Autor: Edwin Ariel Ramos Alvarez
 *************************************************************/
$customStyles = '<link rel="stylesheet" href="../view/css/vistas/terminos.css">'; #cargamos el estilo en especifico de contacto.php
$customScript = '<script src="../view/js/script1.js"></script>'; #cargamos el script
include_once("modules/header.html");  # Incluye <head> y apertura de <body>
include_once("modules/navbar.php");   # Navbar
?>

<!-- #HERO SECTION -->
<section class="hero">
    <div class="hero-contenido">
        <h1 class="hero-titulo">TERMINOS Y CONDICIONES</h1>
        <p class="hero-subtitulo">Última actualización: 30/04/2025</p>
    </div>
</section>

<main>
    <p>Bienvenido a Donativos ITOrizaba. Al utilizar nuestro sitio web y participar en nuestras campañas de donación,
        aceptas estos Términos y Condiciones. Te pedimos que los leas cuidadosamente antes de registrarte o realizar una
        donación.</p>

    <h2>1. Sobre el sitio</h2>
    <p>Donativos ITOrizaba es una plataforma sin fines de lucro que permite a personas y organizaciones realizar
        donaciones en apoyo al Instituto Tecnológico de Orizaba, en forma de aportaciones económicas o donaciones en
        especie (nuevas o seminuevas).</p>

    <h2>2. Registro y uso de la cuenta</h2>
    <ul>
        <li>Para realizar donaciones por medio electrónico, es necesario registrarse en el sitio con datos personales
            básicos.</li>
        <li>El usuario se compromete a proporcionar información verídica, completa y actualizada.</li>
        <li>La información personal está protegida conforme a nuestra Política de Privacidad.</li>
    </ul>

    <h2>3. Donaciones económicas</h2>
    <ul>
        <li>Las donaciones monetarias pueden realizarse mediante tarjeta bancaria (número, fecha de vencimiento y CVV).
        </li>
        <li>Usamos pasarelas de pago seguras y no almacenamos los datos de tu tarjeta en nuestros servidores.</li>
        <li>Cada donación genera un comprobante digital que puede ser consultado por el donante desde su cuenta.</li>
        <li>Todas las donaciones son definitivas. No realizamos devoluciones.</li>
    </ul>

    <h2>4. Donaciones en especie</h2>
    <ul>
        <li>Se aceptan artículos nuevos o seminuevos que estén en condiciones funcionales y útiles.</li>
        <li>El equipo de Donativos ITOrizaba validará cada donación para asegurar su aprovechamiento dentro del
            Instituto.</li>
        <li>Los recursos se destinan a áreas como: biblioteca, aulas inteligentes, laboratorios y mantenimiento del
            campus.</li>
    </ul>

    <h2>5. Uso adecuado del sitio</h2>
    <ul>
        <li>El sitio debe ser utilizado únicamente con fines informativos, de consulta o para realizar donaciones.</li>
        <li>Está prohibido alterar, manipular o intentar vulnerar la seguridad del sistema o sus contenidos.</li>
        <li>No se permite el uso del sitio con fines comerciales ni para difundir información falsa o dañina.</li>
    </ul>

    <h2>6. Propiedad del contenido</h2>
    <p>Todos los textos, imágenes, logotipos y diseño del sitio pertenecen a Donativos ITOrizaba o a sus respectivos
        autores. No está permitido copiar, modificar o reutilizar el contenido sin autorización previa por escrito.</p>

    <h2>7. Modificaciones</h2>
    <p>Nos reservamos el derecho de modificar estos Términos y Condiciones en cualquier momento. Los cambios se
        publicarán en esta misma página y entrarán en vigencia inmediatamente después de su actualización.</p>

    <h2>8. Limitación de responsabilidad</h2>
    <p>Donativos ITOrizaba no se hace responsable por interrupciones del servicio, errores técnicos o caídas del
        servidor. La plataforma actúa como intermediaria en la gestión de donaciones. El uso y distribución final de los
        recursos depende del Instituto Tecnológico de Orizaba.</p>

    <h2>9. Contacto</h2>
    <div class="contacto">
        <p>📩 Correo electrónico: <a href="mailto:donativositorizaba@gmail.com">donativositorizaba@gmail.com</a></p>
        <p>📍 Dirección: Instituto Tecnológico de Orizaba</p>
        <p>📞 Teléfono de contacto: 272 296 4479</p>
        <p>🌐 <a href="https://maps.app.goo.gl/FTPt9tgJz3P59AiS8" target="_blank">Ver en Google Maps</a></p>
    </div>
</main>



<?php
include_once("modules/footer.php"); # Footer y cierre de HTML
?>