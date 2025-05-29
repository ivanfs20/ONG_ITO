<?php
/*************************************************************/
/* Archivo:  gestiondeindicios.php
 * Objetivo: Tabla indicios
 * Autor: Uriel Vallejo Xicalhua
 *************************************************************/
$customStyles = '<link rel="stylesheet" href="../view/css/vistas/gestiondetestimonio.css">'; #cargamos el estilo en especifico de gestiondetestimonio.php
$customScript = '<script src="../view/js/script1.js"></script>'; #cargamos el script
include_once("modules/header.html");  # Incluye <head> y apertura de <body>
include_once("modules/navbar.php");   # Navbar

?>

<div class="header">
        Gestion de Testimonio
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Id testimonio</th>
                    <th>Testimonio</th>
                    <th>Nombre</th>
                    <th>Carrera</th>

                   
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>"La beca que recibi me permitio terminar mi carrera. Hoy soy el primero de mi familia en lograrlo"</td>
                    <td>-Sofia Camacho</td>
                    <td>Estudiante de Ing. Electronica</td>
                    <td><button onclick="window.location.href='testimoniomodificar.php'" class="btn-modificar">Modificar</button>
                    <button onclick="window.location.href='testimonioeliminar.php'" class="btn-eliminar">Eliminar</button>
                </td>
           
                </tr>
            </tbody>
        </table>

      
        <button onclick="window.location.href='testimonioinsertar.php'" class="btn-insertar">Insertar</button>
        <div>
            <a href="gestionpb.php" class="boton-regresar">Regresar</a>
        </div>
    </div>


<?php
include_once("modules/footer.html"); # Footer y cierre de HTML
?>