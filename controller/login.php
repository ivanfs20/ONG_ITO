<?php 
    require_once '../model/Usuario.php';
    $sError = "";
    $sEmail = "";
    $sPassword = "";
    $oUsuario = new Usuario();

    if(empty($_POST["email-registrado"]) || empty($_POST["contraseña-registrada"])){
        $sError = "El email o contraseña estan vacios.";
    }else{
        $sEmail = $_POST["email-registrado"];
        $sPassword = $_POST["contraseña-registrada"];


        $oUsuario -> setsEmail ($sEmail);
        $oUsuario -> setsPassword ($sPassword);

        try{
            $bResl = $oUsuario -> login();

            if($bResl == true){
                session_start();
                $_SESSION["usuario"] = $oUsuario;

                
                if($oUsuario -> getsRol() == "administrador"){
                    header("Location: ../view/sesionadmin.php");
                    exit();
                }else{
                    header("Location: ../view/sesionusuario.php"); 
                    exit();
                }

            }else{
                $sError = "El usuario no existe.";
            }
        }catch(Exception $e){
            $sError = "Error de conexión a la base de datos.";
        }

        if($sError != ""){
            echo $sError;
        }
    }
?>