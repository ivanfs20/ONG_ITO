<?php
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

}
?>