<?php
        require_once '../model/Proyecto.php';
        $sError = "";

        $oProyecto = new Proyecto();

        $id = $_POST["id_proyecto"];
        $title = $_POST["titulo"];
        $description = $_POST["descripcion"];
        $photo = $_POST["foto"];
        $idUsuario = $_POST["id_usuario"];
        $idBenefactor = $_POST["id_benefactor"];


        $oProyecto -> setnIdProyecto($id);
        $oProyecto -> setsTitle($title);
        $oProyecto -> setsDescription($description);
        $oProyecto -> setaPhoto($photo);
        $oProyecto -> setnIdUsuario($idUsuario);
        $oProyecto -> setnIdBenefactor($idBenefactor);
        

        $oProyecto -> deleteById($id);

        header("Location: ../view/gestiondeproyecto.php");
        ?>