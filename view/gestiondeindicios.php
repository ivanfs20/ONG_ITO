<?php
/*************************************************************/
/* Archivo:  gestiondeindicios.php
 * Objetivo: Tabla indicios
 * Autor: Uriel Vallejo Xicalhua
 *************************************************************/
$customStyles = '<link rel="stylesheet" href="../view/css/vistas/gestiondeindicios.css">'; #cargamos el estilo en especifico de gestiondeindicios.php
$customScript = '<script src="../view/js/script1.js"></script>'; #cargamos el script
include_once("modules/header.html");  # Incluye <head> y apertura de <body>
include_once("modules/navbar.php");   # Navbar

?>

<div class="header">
        Gestion de Indicios
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Id Indicio</th>
                    <th>Descripcion</th>
                    <th>Porcentaje</th>

                   
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Aula B-204 sin mobiliario adecuado</td>
                    <td>90%</td>
                    <td><button onclick="window.location.href='indiciomodificar.php'" class="btn-modificar">Modificar</button>
                    <button onclick="window.location.href='indicioeliminar.php'" class="btn-eliminar">Eliminar</button>
                </td>
           
                </tr>
            </tbody>
        </table>

      
        <button onclick="window.location.href='indicioinsertar.php'" class="btn-insertar">Insertar</button>
    </div>


<?php
include_once("modules/footer.html"); # Footer y cierre de HTML
?>