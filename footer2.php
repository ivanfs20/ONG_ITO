<!--  Autor: Edwin Ariel Ramos Alvarez  -->
<footer class="principal-footer">
    <div class="footer-contenedor">
        <div class="footer-grid">
            <!-- Columna 1 - Branding -->
            <div class="footer-columna">
                <div class="footer-logo">
                    <h3 class="footer-title">DONATIVOS<br>ITORIZABA</h3>
                    <p class="footer-eslogan">Donativos ITOrizaba – Una iniciativa solidaria para transformar vidas.
                    </p>
                </div>
            </div>

            <!-- Columna 2 - Organización -->
            <div class="footer-column">
                <h3 class="footer-titulo">Organización</h3>
                <ul class="footer-lista">
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="view/campanas.php">Campañas activas</a></li>
                    <li><a href="view/areasapoyo.php">Áreas de apoyo</a></li>
                    <li><a href="view/transparencia.php">Transparencia</a></li>
                    <li><a href="view/contacto.php">Contacto</a></li>
                </ul>
            </div>

            <!-- Columna 3 - Políticas -->
            <div class="footer-columna">
                <h3 class="footer-titulo">Políticas</h3>
                <ul class="footer-lista">
                    <li><a href="view/privacidad.php">Política de privacidad</a></li>
                    <li><a href="view/terminosycondiciones.php">Términos y condiciones</a></li>
                </ul>
            </div>


            <?php
            require_once 'model/Usuario.php';
            $bSession = false;
            if (isset($_SESSION['usuario'])) {
                $oUsuario = $_SESSION["usuario"];
                $bSession = true;
                if(isset($_SESSION["nombre"])){
                    $nombre=$_SESSION["nombre"];
                }
            } else {
                $oUsuario = null;
                $bSession = false;
            }
            
            
            ?>


            <!-- Columna 4 - Suscripción -->
            <div class="footer-columna">
                <h3 class="footer-titulo">Suscripción</h3>
                <form class="mini-formulario" method="POST" action="controller/emailSuscripcion.php">
                    <input type="email" placeholder="Ingresa tu email" name="email">
                    <input type="hidden"  required name="nombre" value=<?php
                        if($bSession==true){echo $oUsuario ->getsNombreC();}else{
                            echo "USUARIO NO REGISTRADO";
                        }
                    ?>
                    >
                    <button type="submit">Suscribirse →</button>
                </form>
                <p class="formulario-texto">Recibe actualizaciones de nuestras campañas</p>
            </div>
        </div>

        <!-- Derechos de autor -->
        <div class="footer-boton">
            <p>© 2024 Donativos ITOrizada. Todos los derechos reservados.</p>
        </div>
    </div>
</footer>
</body>

</html>