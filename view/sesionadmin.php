<?php
/*************************************************************/
/* Archivo:  sesionadmin.php
 * Objetivo: Menu principal para el administrador
 * Autor: Uriel Vallejo Xicalhua
 *************************************************************/
$customStyles = '<link rel="stylesheet" href="../view/css/vistas/sesionadmin.css">'; #cargamos el estilo en especifico de contacto.php
$customScript = '<script src="../view/js/script1.js"></script>'; #cargamos el script
include_once("modules/header.html");  # Incluye <head> y apertura de <body>
include_once("modules/navbar.php");   # Navbar

?>


<div class="banner">
        "Bienvenido al panel de gestión, [nombre]. Tu labor mantiene viva la misión de esta ONG. Cada dato que administras ayuda a construir un impacto real."
    </div>

    <div class="container">
        <h2>Secciones CRUD principales:</h2>
        <div class="cards">
            <div class="card">
                <img src="https://via.placeholder.com/280x150?text=Donaciones" alt="Donaciones">
                <p>Ver todas las donaciones<br>Editar / Eliminar registros</p>
                <a href="gestiondedonaciones.php">Gestión de Donaciones →</a>
            </div>
            <div class="card">
                <img src="https://via.placeholder.com/280x150?text=Proyectos" alt="Proyectos">
                <p>Crear, editar, eliminar campañas</p>
                <a href="gestionpb.php">Gestión de Proyectos y Benefactor →</a>
            </div>
            <div class="card">
                <img src="https://via.placeholder.com/280x150?text=Usuarios" alt="Usuarios">
                <p>Listado de usuarios<br>Asignar roles</p>
                <a href="gestiondeusuarios.php">Gestión de Usuarios →</a>
            </div>
        </div>
        
        <div class="footer">
            Solo el administrador puede acceder a estas páginas, protegido por sesiones y roles.
        </div>
    </div>

<?php
include_once("modules/footer.html"); # Footer y cierre de HTML
?>
