<?php
/*************************************************************/
/* Archivo:  gestiondigital.php
 * Objetivo: Tabla donaciones digitales
 * Autor: Uriel Vallejo Xicalhua
 *************************************************************/
$customStyles = '<link rel="stylesheet" href="../view/css/vistas/gestiondeproyecto.css">'; #cargamos el estilo en especifico de gestiondigital.php
include_once("modules/header.html");  # Incluye <head> y apertura de <body>
include_once("modules/navbar.php");   # Navbar

?>

<div class="header">
        Gestion de Anuncios
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Id Proyecto</th>
                    <th>Titulo</th>
                    <th>Descripcion</th>
                    <th>Foto</th>
                  
                   
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>10203</td>
                    <td>Aula B-204 sin mobiliario adecuado</td>
                    <td>Donec a eros justo. Fusce egestas tristique ultrices. Nam tempor, augue nec tincidunt molestie, massa nunc varius arcu, at scelerisque elit erat a magna. Donec quis erat 
                        at libero ultrices mollis. In hac habitasse platea dictumst. Vivamus vehicula leo dui, at porta nisi facilisis finibus. In euismod augue vitae nisi ultricies, non aliquet 
                        urna tincidunt. Integer in nisi eget nulla commodo faucibus efficitur quis massa. Praesent felis est, finibus et nisi ac, hendrerit venenatis libero. Donec consectetur faucibus ipsum id gravida.</td>
                    <td>.png</td>
                    <td><button class="btn-modificar">Modificar</button>
                    <button class="btn-eliminar">Eliminar</button>
                </td>
           
                </tr>
            </tbody>
        </table>

      
        <button class="btn-insertar">Insertar</button>
    </div>


<?php
include_once("modules/footer.html"); # Footer y cierre de HTML
?>