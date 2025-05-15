<?php
class Proyecto{
    private $nIdProyecto = 0;
    private $sTitle = "";
    private $sDescription = "";
    private $aPhoto = [];
    private $nIdUsuario = 0;
    private $nIdBenefactor = 0;

    public function setnIdProyecto($nIdProyecto){
        $this -> nIdProyecto = $nIdProyecto;
    }

    public function setsTitle($sTitle){
        $this -> sTitle = $sTitle;
    }

    public function setsDescription($sDescription){
        $this -> sDescription = $sDescription;
    }

    public function setaPhoto($aPhoto){
        $this -> aPhoto = $aPhoto;
    }

    public function setnIdUsuario($nIdUsuario){
        $this -> nIdUsuario = $nIdUsuario;
    }

    public function setnIdBenefactor($nIdBenefactor){
        $this -> nIdBenefactor = $nIdBenefactor;
    }

    public function getnIdProyecto(){
        return $this -> nIdProyecto;
    }

    public function getsTitle(){
        return $this -> sTitle;
    }

    public function getsDescription(){
        return $this -> sDescription;
    }

    public function getaPhoto(){
        return $this -> aPhoto;
    }

    public function getnIdUsuario(){
        return $this -> nIdUsuario;
    }

    public function getnIdBenefactor(){
        return $this -> nIdBenefactor;
    }
}
?>