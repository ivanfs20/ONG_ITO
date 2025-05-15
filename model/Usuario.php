<?php

include("AccesoDatos.php");

class Usuario{
    private $nIdUsuario = 0;
    private $sNombreC = "";
    private $sEmail = "";
    private $sPassword = "";
    private $sRol = "";


    public function setnIdUsuario($nIdUsuario){
        $this -> nIdUsuario = $nIdUsuario;
    }

    public function setsNombreC($sNombreC){
        $this -> sNombreC = $sNombreC;
    }

    public function setsEmail($sEmail){
        $this -> sEmail = $sEmail;
    }

    public function setsPassword($sPassword){
        $this -> sPassword = $sPassword;
    }

    public function setsRol($sRol){
        $this -> sRol = $sRol;
    }

    public function getnIdUsuario(){
        return $this -> nIdUsuario;
    }

    public function getsNombreC(){
        return $this -> sNombreC;
    }

    public function getsEmail(){
        return $this -> sPassword;
    }

    public function getsRol(){
        return $this -> sRol;
    }


    // B -LOGIN : Carlos Iván Flores Sánchez
    public function login(){
        $oAccesoDatos = new AccesoDatos();
        $sQuery = "";
        $bRet = false;
        $arrRS = null;

        if($this->sNombreC=="" || $this->sPassword==""){throw new Exception("/m/Benefactor/login/sNombreC&&sPassword");}else{
            if($oAccesoDatos->conectar()){
                $sQuery = "SELECT nIdUsuario, sRol FROM Usuario WHERE sNombreC = '$this->sNombreC' AND sPassword = '$this->sPassword'";
                $arrRS = $oAccesoDatos -> consulta($sQuery);
                $oAccesoDatos -> desconectar();
                if($arrRS != null){
                    $this -> nIdUsuario = $arrRS[0][0];
                    $this -> sRol = $arrRS[0][1];
                    $bRet = true;
                }
            }
        }
        return $bRet;
    }

}
?>