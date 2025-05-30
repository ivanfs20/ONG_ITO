<?php
/*************************************************************/
/* Archivo:  sesionadmin.php
 * Objetivo: Menu principal para el administrador
 * Autor: Uriel Vallejo Xicalhua
 *************************************************************/
$customStyles = '<link rel="stylesheet" href="../view/css/vistas/sesionadmin.css">'; #cargamos el estilo en especifico de contacto.php
$customScript = '<script src="../view/js/script1.js"></script>'; #cargamos el script
include_once("modules/header.html");  # Incluye <head> y apertura de <body>
//include_once("modules/navbar.php");   # Navbar
require_once '../model/Usuario.php';
session_start();
require_once '../navbar2.php';
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

if ($oUsuario != null && $oUsuario->getsRol() == "administrador") {
    ?>


    <div class="banner">
        "Bienvenido al panel de gestión,<?php echo  $oUsuario->getsNombreC();  ?>. Tu labor mantiene viva la misión de esta ONG. Cada dato que administras
        ayuda a construir un impacto real."
    </div>

    <div class="container">
        <h2>Secciones CRUD principales:</h2>
        <div class="cards">
            <div class="card">
                <img src="media/proyecto.jpg" alt="Donaciones">
                <p>Ver todas las donaciones, editar / eliminar registros</p>
                <a href="gestiondedonaciones.php">Gestión de Donaciones →</a>
            </div>
            <div class="card">
                <img src="media/proyecto.jpg" alt="Proyectos">
                <p>Crear, editar, eliminar campañas</p>
                <a href="gestionpb.php">Gestión de Proyectos y Beneficiario →</a>
            </div>
            <div class="card">
                <img src="media/proyecto.jpg" alt="Usuarios">
                <p>Crear, editar, eliminar todos los usuarios</p>
                <a href="gestiondeusuarios.php">Gestión de Usuarios →</a>
            </div>
        </div>

        <div class="footer">
            Solo el administrador puede acceder a estas páginas, protegido por sesiones y roles.
        </div>
    </div>

    <?php
}{
    if($bSession == false){
        include_once("loginUrgente.php");
      }}
include_once("modules/footer.php"); # Footer y cierre de HTML
?>