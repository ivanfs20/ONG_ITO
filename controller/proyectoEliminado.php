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
        

      //  $oProyecto -> deleteById($id);

      //  header("Location: ../view/gestiondeproyecto.php");
      
      try {
        $resultado = $oProyecto -> deleteById($id); // Este método debe devolver true si se insertó correctamente
    
        if ($resultado) {
            header("Location: ../view/popproyecto.php?msg=borrado");
        } else {
            header("Location: ../view/popproyecto.php?msg=errorregistro");
        }
    } catch (Exception $e) {
        error_log("Error al eliminar proyecto: " . $e->getMessage());
        header("Location: ../view/popproyecto.php?msg=errorregistro");
    }
    exit();
        ?>