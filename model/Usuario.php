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


    // B -LOGIN : Carlos Iván Flores Sánchez -> CAMBIE DE sNombreC a sEmail
    public function login(){
        $oAccesoDatos = new AccesoDatos();
        $sQuery = "";
        $bRet = false;
        $arrRS = null;

        if($this->sEmail=="" || $this->sPassword==""){throw new Exception("/m/Benefactor/login/sEmail&&sPassword");}else{
            if($oAccesoDatos->conectar()){
                $sQuery = "SELECT nIdUsuario, sRol FROM Usuario WHERE sEmail = '$this->sEmail' AND sPassword = '$this->sPassword'";
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

    //B-REGISTER: Saul Lima Gonzalez
    public function exists($sName,$sPassword){
        $oAccesoDatos=new AccesoDatos();
        $sQuery="";
        $bandera=false;
        $arrRS=null;
        if($oAccesoDatos->conectar()){
            $sQuery="SELECT nIdUsuario,sNombreC,sPassword FROM Usuario WHERE sNombreC='".$sName."' AND sPassword='".$sPassword."'";
            $arrRS=$oAccesoDatos->consulta($sQuery);
            $oAccesoDatos->desconectar();
            if($arrRS && is_array($arrRS)){
                $bandera=true;
            }
        }
        return $bandera;
    }
    //B-REGISTER:Saul Lima Gonzalez
    public function register(){
        $oAccesoDatos=new AccesoDatos();
        $sQuery="";
        $nAfectados=-1;
        if($this->sNombreC=="" || $this->sPassword=="" || $this->sEmail=="" || $this->sRol==""){
            throw new Exception("message/Usuario/datos vacios");
        }else{
         if($this->exists($this->sNombreC,$this->sPassword)){
            throw new Exception("message/Usuario/usuario ya existente");
        }else if($oAccesoDatos->conectar()){
            $sQuery="INSERT INTO Usuario (sNombreC,sPassword,sEmail,sRol)
            VALUES ('".$this->sNombreC."', '".$this->sPassword."', '"
            .$this->sEmail."', '".$this->sRol."')";
            $nAfectados=$oAccesoDatos->comando($sQuery);
            $oAccesoDatos->desconectar();
        }        
    }
    return $nAfectados;
    }

}
?>