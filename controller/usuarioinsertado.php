<?php
        include_once '../model/Usuario.php';
        $sError = "";

        $oUsuario = new Usuario();

        $nombre = $_POST["nombre_usuario"];
        $correo = $_POST["correo"];
        $contraseña = $_POST["contraseña"];
        $rfc = $_POST["rfc"];
        $rol = $_POST["rol"];

        $oUsuario -> setsNombreC($nombre);
        $oUsuario -> setsEmail($correo);
        $oUsuario -> setsPassword($contraseña);
        $oUsuario -> setsRol($rol); 
        $oUsuario -> setsRfc($rfc);  

        $oUsuario -> register();

        header("Location: ../view/gestiondeusuarios.php");
        ?>