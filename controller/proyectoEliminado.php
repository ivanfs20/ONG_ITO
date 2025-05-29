<?php
        require_once '../model/Proyecto.php';
        $sError = "";

        $oProyecto = new Proyecto();

        $id = $_POST["id_proyecto"];
        $title = $_POST["titulo"];
        $description = $_POST["descripcion"];
        $photo = $_POST["foto"];
        $idUsuario = $_POST["id_usuario"];


        $oProyecto -> setnIdProyecto($id);
        $oProyecto -> setsTitle($title);
        $oProyecto -> setsDescription($description);
        $oProyecto -> setaPhoto($photo);
        $oProyecto -> setnIdUsuario($idUsuario);
        

        $oProyecto -> deleteById($id);

        header("Location: ../view/gestiondeproyecto.php");
        ?>