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

      //  $oUsuario -> update();

       // header("Location: ../view/gestiondeusuarios.php");
       
try {
        $resultado = $oUsuario->update(); // Este método debe devolver true si se insertó correctamente
    
        if ($resultado) {
            header("Location: ../view/popusuario.php?msg=modificado");
        } else {
            header("Location: ../view/popusuario.php?msg=errorregistro");
        }
    } catch (Exception $e) {
        error_log("Error al modificar usuario: " . $e->getMessage());
        header("Location: ../view/popusuario.php?msg=errorregistro");
    }
    exit();
        ?>