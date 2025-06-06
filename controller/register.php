<?php
//B-> B - CONTROLLER – REGISTER :Saul Lima Gonzalez
include '../model/Usuario.php';
$sError = "";
$sName = trim($_POST['full-name']);
$sEmail = trim($_POST['e-mail']);
$sPassword = trim($_POST['contraseña']);
$sConfirm = trim($_POST['confirmar-contraseña']);
$sRfc=trim($_POST['RFC']);
$sDomicilio=trim($_POST['domicilio']);
$sRole = "donador";
$sMessage = "";

$oUser = new Usuario();

if (empty($sName) || empty($sEmail) || empty($sPassword) || empty($sConfirm)) {
    $sError = "Llena todos los campos, no deben estar vacios";
}
else if($oUser->exists($sEmail)){
    header("Location: ../view/popregistrarse.php?msg=correo");
    //echo "El email que ingresaste ya esta dado de alta";
}
 else if (validatePassword($sPassword, $sConfirm)) {
    if (securityPassword($sPassword)) {
        if (validateUpperCase($sPassword)) {
            $oUser->setsNombreC($sName);
            $oUser->setsEmail($sEmail);
            $oUser->setsPassword($sPassword);
            $oUser->setsRol($sRole);
            $oUser->setsRfc($sRfc);
            $oUser->setsDomicilio($sDomicilio);
            try {
                $nAfectados = $oUser->register();
                if ($nAfectados > 0) {
                    header("Location: ../view/popregistrarse.php?msg=exitoso");                   
                    exit();
                } else {
                    $sError = "No se pudo insertar en la BD, intenta de nuevo o mas tarde";
                }
            } catch (Exception $e) {
                $sError = "Error en la conexion de la BD/" . $e->getMessage();
            }
        }else{
             header("Location: ../view/popregistrarse.php?msg=mayuscula");
            //echo "La contraseña debe tener al menos una mayuscula";
        }
    } else {
        header("Location: ../view/popregistrarse.php?msg=mayor");
        //echo "La contraseña debe tener al menos 8 caracteres";
    }
} else {
    header("Location: ../view/popregistrarse.php?msg=diferentes");
    echo "Las contraseñas no coinciden";
}


//Funcion para comprobar si la contraseña y la confirmacion coinciden : Saul Lima Gonzalez
function validatePassword($sPassword, $sConfirm)
{
    $bandera = false;
    if (trim($sPassword) == trim($sConfirm)) {
        $bandera = true;
    }
    return $bandera;
}

//Funcion para comprobar  que la contraseña no tenga menos de 8 caracteres: Saul Lima Gonzalez
function securityPassword($sPass)
{
    $bandera = true;
    if (strlen($sPass) < 8) {
        $bandera = false;
    }
    return $bandera;
}

//Funcion para verificar que tenga al menos una mayuscula : Saul Lima Gonzalez
function validateUpperCase($sNombre)
{
    $bandera = false;
    if (preg_match('/[A-Z]/', $sNombre)) {
        $bandera = true;
    }
    return $bandera;
}
?>