<?php
/*************************************************************/
/* Archivo:  usuarioeliminar.php
 * Objetivo: Eliminar campo de un usuario
 * Autor: Uriel Vallejo Xicalhua
 *************************************************************/
$customStyles = '<link rel="stylesheet" href="../view/css/vistas/usuarioeliminar.css">'; #cargamos el estilo en especifico de usuarioeliminar.php
$customScript = '<script src="../view/js/script1.js"></script>'; #cargamos el script
include_once("modules/header.html");  # Incluye <head> y apertura de <body>
include_once("modules/navbar.php");   # Navbar

?>


<div class="header">Eliminar Usuario</div>

<div class="container">
    <table>
        <tr>
            <th>Id Usuario</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Contraseña</th>
            <th>Rol</th>
        </tr>
    </table>

    <form>
        <label for="id_usuario">Id Usuario:</label>
        <input type="text" id="id_usuario" name="id_usuario">

        <label for="id_nombre">Nombre:</label>
        <input type="text"  id=" id_nombre " name="id_nombre">

        <label for="id_correo">Correo:</label>
        <input type="text"  id=" id_dscripcion " name="id_descripcion">

        <label for="id_contraseña">Contraseña:</label>
        <input type="text"  id=" id_contraseña " name="id_contraseña">

        <label for="id_rol">Rol:</label>
        <input type="text"  id=" id_rol " name="id_rol">

        <div>
        <button class="button">Confirmar</button>

</div>
       


<?php
include_once("modules/footer.html"); # Footer y cierre de HTML
?>