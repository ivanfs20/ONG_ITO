<?php
        include_once '../model/Proyecto.php';
        $sError = "";

        $oProyecto = new Proyecto();

        $title = $_POST["titulo"];
        $description = $_POST["descripcion"];
        $photo = $_POST["foto"];
        $idBenefactor = $_POST["id_benefactor"];

        $oUsuario = $_POST["id_usuario"];
        $oProyecto -> setsTitle($title);
        $oProyecto -> setsDescription($description);
        $oProyecto -> setaPhoto($photo);
        $oProyecto -> setnIdUsuario($oUsuario);
        $oProyecto -> setnIdBenefactor($idBenefactor);
        

        $oProyecto -> create();

        header("Location: ../view/gestiondeproyecto.php");
        ?>