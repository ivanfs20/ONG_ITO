<?php
/*************************************************************/
/* Archivo:  index.php
 * Objetivo: Pagina inicial para atraer/llamar la atencion de 
 *           los usuarios y insitarlos a donar
 * Autor: Edwin Ariel Ramos Alvarez
 *************************************************************/
$customStyles = '<link rel="stylesheet" href="view/css/vistas/landingpage.css">'; #cargamos el estilo en especifico de la landing page
$customScript = '<script src="../view/js/script1.js"></script>'; #cargamos el script
include_once("view/modules/header.html");  # Incluye <head> y apertura de <body>
include_once("navbar2.php");   # Navbar
include_once("view/modules/hero.php"); // Incluye la función

// Define las variables para personalizar el hero
$tituloPagina = "Ayuda a transformar el futuro de cientos de estudiantes del ITOrizaba";
$subtituloPagina = "Cada peso cuenta. Dona hoy y forma parte del cambio.";
$botonHero = [
    'texto' => "¡Quiero donar ahora!",
    'url' => "view/D1_Area.php"
];

// Muestra el hero con los parámetros
mostrarHero($tituloPagina, $subtituloPagina, $botonHero);
?>
<!-- Sección de Propósito -->
<section class="seccion-por-que">
    <div class="por-que-contenedor">
        <div class="por-que-grid">
            <!-- Columna de Imagen -->
            <div class="por-que-imagen">
                <img src="view/media/porque.jpg" alt="Estudiantes en laboratorio">
            </div>

            <!-- Columna de Texto -->
            <div class="por-que-content">
                <h2 class="seccion-titulo">¿Por qué hacemos esto?</h2>
                <p class="por-que-texto">
                    Actualmente, la gestión de donativos se hace manualmente. Esta plataforma busca profesionalizar
                    y hacer transparente el uso de cada donación.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Sección Tabla de evidencias -->
<section class="tabla-seccion">
    <div class="tabla-contenedor">
        <!-- Tabla de Evidencias de Material -->
        <div class="tabla-material">
            <div class="tabla-header">
                <h2 class="seccion-titulo">Evidencias de Material</h2>
                <p class="tabla-descripcion">Estado actual de los recursos materiales en nuestras instalaciones.</p>
            </div>

            <div class="evidencia-tabla material">
                <?php require_once 'controller/materialIndexController.php'; ?>
            </div>
        </div>

        <!-- Tabla de Evidencias de Donación -->
        <div class="tabla-donacion">
            <div class="tabla-header">
                <h2 class="seccion-titulo">Evidencias de Donación</h2>
                <p class="tabla-descripcion">Registro de contribuciones y su impacto en nuestra institución.</p>
            </div>

            <div class="evidencia-tabla donacion">
                <table class="tabla-datos">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Monto</th>
                            <th>Folio</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php require_once 'controller/digitalIndexController.php'; ?>
                    </tbody>
                </table>
            </div>
        </div>


    </div>
</section>


<!-- Sección situacion conmovedora -->

<section class="estadisticas-seccion">
    <div class="estadisticas-contenedor">
        <div class="dos-columna-layout">
            <!-- Columna Izquierda -->
            <div class="texto-columna">
                <h2 class="titulo-principal">Situación de los alumnos del Tecnológico de Orizaba</h2>
                <p class="subtitulo">Más allá de la matrícula, hay historias que necesitan tu apoyo.</p>
            </div>


            <?php
                include_once("model/Digital.php");
                include_once("model/Material.php");
                include_once("model/Usuario.php");
                $oDonacionMaterial = new Material();
                $oDonacionDigital = new Digital();
                $oUsuariosActivosDonadores = new Usuario();
                $nUsuariosAct = $oUsuariosActivosDonadores -> getActivos();
                $nDigital = count($oDonacionDigital->readByJoin());
                $nMaterial = count($oDonacionMaterial->readByJoin()); 
                $nSuma = $nDigital + $nMaterial;

                if($nSuma<=0 and $nDigital>0){
                    $pDigital = 100;
                }else if($nSuma<=0 and $nMaterial>0){
                    $pMaterial=100;
                }else{
                    if($nDigital==0 and $nMaterial==0){
                        $pDigital = 0;
                        $pMaterial = 0;                      
                    }else{
                        $pDigital = floor((100*$nDigital)/$nSuma);
                        $pMaterial = floor((100*$nMaterial)/$nSuma);
                    }
                }


            ?>

            <!-- Columna Derecha -->
            <div class="columna-estadisticas">
                <!-- Item 1 -->
                <div class="estadisticas-item">
                    <div class="estadisticas-icono">🎓</div>
                    <div class="stat-content">
                        <span class="estadisticas-numero"><?php echo count($nUsuariosAct);?></span>
                        <p class="estadisticas-descripccion">usuarios registrados.</p>
                    </div>
                </div>

                <!-- Item 2 -->
                <div class="estadisticas-item">
                    <div class="estadisticas-icono">🏦</div>
                    <div class="stat-content">
                        <span class="estadisticas-numero">El <?php echo $pDigital;?>%</span>
                        <p class="estadisticas-descripccion">de las donaciónes son de tipo Digital.</p>
                    </div>
                </div>

                <!-- Item 3 -->
                <div class="estadisticas-item">
                    <div class="estadisticas-icono">📦</div>
                    <div class="stat-content">
                        <span class="estadisticas-numero">El <?php echo $pMaterial;?>%</span>
                        <p class="estadisticas-descripccion">de las donaciónes son de tipo Material.
                        </p>
                    </div>
                </div>
                <?php
            
            ?>
            </div>
        </div>
    </div>
</section>

<!-- Sección de Colaboración -->
<section class="colaboracion-seccion">
    <div class="colaboracion-contenedor">
        <div class="collab-content">
            <h2 class="colaboracion-titulo">Colabora con donativos</h2>
            <p class="colaboracion-subtitulo">ITOrizaba, ayudar es crecer<br>y crecer es vivir.</p>
            <a href="view/D1_Area.php" class="colaboracion-boton">Quiero colaborar</a>
        </div>
    </div>
</section>

<?php
include_once("footer2.php"); # Footer y cierre de HTML
?>