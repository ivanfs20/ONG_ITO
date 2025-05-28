<?php
        include_once '../model/Usuario.php';
        $sError = "";

        $oUsuario = new Usuario();
        $id=$_POST['id_usuario'];
        $nombre = $_POST["nombre_usuario"];
        $correo = $_POST["correo"];
        $contraseña = $_POST["contraseña"];
        $rfc = $_POST["rfc"];
        $rol = $_POST["rol"];
        $domicilio=$_POST["domicilio"];

        $oUsuario->setnIdUsuario($id);
        $oUsuario -> setsNombreC($nombre);
        $oUsuario -> setsEmail($correo);
        $oUsuario -> setsPassword($contraseña);
        $oUsuario -> setsRol($rol); 
        $oUsuario -> setsRfc($rfc);  
        $oUsuario->setsDomicilio($domicilio);

        $oUsuario -> update();

        header("Location: ../view/gestiondeusuarios.php");
        ?>