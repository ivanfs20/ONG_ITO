<?php
        include_once '../model/Proyecto.php';
        $sError = "";

        $oProyecto = new Proyecto();

        $title = $_POST["titulo"];
        $description = $_POST["descripcion"];

// Leer archivo
if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $photoContent = file_get_contents($_FILES['foto']['tmp_name']);
    } else {
        $photoContent = null; // o lanzar error si es obligatorio
    }


        $oUsuario = $_POST["id_usuario"];
        $oProyecto -> setsTitle($title);
        $oProyecto -> setsDescription($description);
        $oProyecto -> setaPhoto($photoContent);
        $oProyecto -> setnIdUsuario($oUsuario);
        

        $oProyecto -> create();

        header("Location: ../view/gestiondeproyecto.php");
        ?>