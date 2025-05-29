<?php
        require_once '../model/Proyecto.php';
        $sError = "";

        $oProyecto = new Proyecto();

        $id = $_POST["id_proyecto"];
        $title = $_POST["titulo"];
        $description = $_POST["descripcion"];
        $idUsuario = $_POST["id_usuario"];

        if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
                $photoContent = file_get_contents($_FILES['foto']['tmp_name']);
            } else {
                $photoContent = null; // o lanzar error si es obligatorio
            }

        $oProyecto -> setnIdProyecto($id);
        $oProyecto -> setsTitle($title);
        $oProyecto -> setsDescription($description);
        $oProyecto -> setaPhoto($photoContent);
        $oProyecto -> setnIdUsuario($idUsuario);
        

      //  $oProyecto -> update();

      //  header("Location: ../view/gestiondeproyecto.php");


      try {
        $resultado = $oProyecto -> update(); // Este método debe devolver true si se insertó correctamente
    
        if ($resultado) {
            header("Location: ../view/popproyecto.php?msg=modificado");
        } else {
            header("Location: ../view/popproyecto.php?msg=errorregistro");
        }
    } catch (Exception $e) {
        error_log("Error al modificar proyecto: " . $e->getMessage());
        header("Location: ../view/popproyecto.php?msg=errorregistro");
    }
    exit();

        ?>