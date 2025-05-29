<?php
/*************************************************************/
/* Archivo:  privacidad.php
 * Objetivo: Politica de privacidad para explicar como tratamos y que le hacemos a las donaciones
 * Autor: Edwin Ariel Ramos Alvarez
 *************************************************************/
$customStyles = '<link rel="stylesheet" href="../view/css/vistas/privacidad.css">'; #cargamos el estilo en especifico de contacto.php
$customScript = '<script src="../view/js/script1.js"></script>'; #cargamos el script
include_once("modules/header.html");  # Incluye <head> y apertura de <body>
include_once("modules/navbar.php");   # Navbar
?>

<!-- #HERO SECTION -->
<section class="hero">
    <div class="hero-contenido">
        <h1 class="hero-titulo">POLITICA DE PRIVACIDAD</h1>
        <p class="hero-subtitulo">Última actualización: 30/04/2025</p>
    </div>
</section>


<!-- #SECCION LISTADO -->
<main>
    <p>En Donativos ITOrizaba, valoramos la confianza que depositas en nosotros. Por eso, hemos creado esta Política de
        Privacidad para explicarte cómo tratamos y protegemos tus datos personales al utilizar nuestra página web y al
        participar en campañas de donación.</p>

    <h2>1. Información general</h2>
    <p>Donativos ITOrizaba es una iniciativa sin fines de lucro enfocada en recibir donaciones económicas y en especie
        (nuevas o seminuevas) para apoyar al Instituto Tecnológico de Orizaba. Esta política aplica al uso de nuestra
        página web y a cualquier interacción que implique el envío de datos personales.</p>

    <h2>2. Responsable del tratamiento</h2>
    <ul>
        <li><strong>Nombre:</strong> Donativos ITOrizaba</li>
        <li><strong>Correo electrónico:</strong> donativositorizaba@gmail.com</li>
        <li><strong>Ubicación física:</strong> Instituto Tecnológico de Orizaba</li>
        <li><strong>Google Maps:</strong> <a href="https://maps.app.goo.gl/FTPt9tgJz3P59AiS8"
                target="_blank">Ubicación</a></li>
    </ul>

    <h2>3. Qué datos personales recolectamos</h2>
    <ul>
        <li>Nombre completo</li>
        <li>Correo electrónico</li>
        <li>Teléfono de contacto</li>
        <li>Tipo y monto de la donación</li>
        <li>Cualquier otro dato que nos proporciones de forma voluntaria</li>
    </ul>
    <p>Además, si realizas una donación económica, el sistema te pedirá los datos de tu tarjeta bancaria: número, fecha
        de vencimiento y código de seguridad (CVV). Estos datos se utilizan únicamente para procesar el pago al momento
        de realizar la donación y no se almacenan en nuestros servidores.</p>


    <!-- Tabla de recolección de datos -->
    <div class="contenedor-tabla">
        <table class="tabla-datos">
            <thead class="cabecera-tabla">
                <tr>
                    <th class="columna-canal">Canal de recolección</th>
                    <th class="columna-tipo">Tipo de datos recopilados</th>
                    <th class="columna-finalidad">Finalidad principal del tratamiento</th>
                </tr>
            </thead>
            <tbody>
                <tr class="fila-datos">
                    <td data-titulo="Canal" class="celda-canal">Formulario de registro</td>
                    <td data-titulo="Datos" class="celda-tipo">Nombre, correo electrónico, teléfono</td>
                    <td data-titulo="Finalidad" class="celda-finalidad">Crear una cuenta para donar o interactuar con la
                        plataforma</td>
                </tr>
                <!-- #2 -->
                <tr class="fila-datos">
                    <td data-titulo="Canal" class="celda-canal">Formulario de donacion</td>
                    <td data-titulo="Datos" class="celda-tipo">Nombre, correo electrónico, tipo de donativo, monto,
                        datos de tarjeta (numero, fecha, CVV)</td>
                    <td data-titulo="Finalidad" class="celda-finalidad">Procesar la informacion monetaria de forma
                        segura</td>
                </tr>
                <!-- #3 -->
                <tr class="fila-datos">
                    <td data-titulo="Canal" class="celda-canal">Contacto por correo electronico</td>
                    <td data-titulo="Datos" class="celda-tipo">Nombre, correo electrónico, mensaje</td>
                    <td data-titulo="Finalidad" class="celda-finalidad">Atender dudas, aclaraciones o solicitudes de
                        usuario</td>
                </tr>
                <!-- #4 -->
                <tr class="fila-datos">
                    <td data-titulo="Canal" class="celda-canal">Donacion en especie (en persona)</td>
                    <td data-titulo="Datos" class="celda-tipo">Nombre, telefono, tipo de recurso compartido</td>
                    <td data-titulo="Finalidad" class="celda-finalidad">Validar y documentar recursos compartidos a la
                        ONG</td>
                </tr>

                <!-- #5 -->
                <tr class="fila-datos">
                    <td data-titulo="Canal" class="celda-canal">Reportes administrativos internos</td>
                    <td data-titulo="Datos" class="celda-tipo">Nombre, monto donado, area beneficiada</td>
                    <td data-titulo="Finalidad" class="celda-finalidad">Llevar estadisticas y emiter comprobantes de
                        donacion</td>
                </tr>
            </tbody>
        </table>
    </div>

    <h2>4. Finalidades del tratamiento</h2>
    <ul>
        <li>Registrar y dar seguimiento a tus donaciones</li>
        <li>Emitir comprobantes digitales</li>
        <li>Contactarte si es necesario</li>
        <li>Llevar un control estadístico y administrativo del programa</li>
    </ul>
    <p>No utilizamos tus datos para campañas comerciales ni para elaborar perfiles publicitarios.</p>

    <h2>5. No usamos cookies</h2>
    <p>Nuestro sitio web no utiliza cookies, ni herramientas de rastreo, ni tecnologías similares. Tu navegación es
        completamente privada.</p>

    <h2>6. Menores de edad</h2>
    <p>Para registrarte y hacer donaciones, debes tener al menos 14 años de edad. Si eres menor, te pedimos que un
        adulto te ayude o autorice el proceso.</p>

    <h2>7. Almacenamiento y protección de datos</h2>
    <p>Los datos personales son almacenados de forma segura. Implementamos medidas técnicas básicas para evitar accesos
        no autorizados, pérdidas o uso indebido de la información.</p>

    <h2>8. Compartición de datos</h2>
    <p>Tus datos no se venden ni comparten con terceros, salvo obligación legal. Solo el equipo responsable de la
        gestión de donaciones tiene acceso limitado a ellos.</p>

    <h2>9. Plazo de conservación</h2>
    <p>Los datos se conservarán solo el tiempo necesario para cumplir con las finalidades del proyecto o por obligación
        legal, en su caso.</p>

    <h2>10. Tus derechos</h2>
    <ul>
        <li>Consultar qué datos tenemos de ti</li>
        <li>Solicitar su corrección o eliminación</li>
        <li>Retirar tu consentimiento en cualquier momento</li>
    </ul>
    <p>Para ejercer estos derechos, contáctanos al correo <strong>donativositorizaba@gmail.com</strong></p>

    <h2>11. Cambios en esta política</h2>
    <p>Nos reservamos el derecho de actualizar esta política. Cualquier cambio será publicado aquí con la fecha
        correspondiente.</p>

    <h2>Contacto</h2>
    <ul>
        <li>📩 Correo electrónico: donativositorizaba@gmail.com</li>
        <li>📍 Ubicación: <a href="https://maps.app.goo.gl/FTPt9tgJz3P59AiS8" target="_blank">Google Maps</a></li>
    </ul>
</main>


<?php
include_once("modules/footer.php"); # Footer y cierre de HTML
?>