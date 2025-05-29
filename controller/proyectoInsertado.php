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

        $idBenefactor = $_POST["id_benefactor"];

        $oUsuario = $_POST["id_usuario"];
        $oProyecto -> setsTitle($title);
        $oProyecto -> setsDescription($description);
        $oProyecto -> setaPhoto($photoContent);
        $oProyecto -> setnIdUsuario($oUsuario);
        $oProyecto -> setnIdBenefactor($idBenefactor);
        

       // $oProyecto -> create();

        //header("Location: ../view/gestiondeproyecto.php");

    
        try {
            $resultado = $oProyecto -> create(); // Este método debe devolver true si se insertó correctamente
        
            if ($resultado) {
                header("Location: ../view/popproyecto.php?msg=agregado");
            } else {
                header("Location: ../view/popproyecto.php?msg=errorregistro");
            }
        } catch (Exception $e) {
            error_log("Error al registrar proyecto: " . $e->getMessage());
            header("Location: ../view/popproyecto.php?msg=errorregistro");
        }
        exit();
        ?>