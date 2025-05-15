<?php
class Donacion{
    protected $nIdDonacion = 0;
    protected $nAmount = 0;
    protected $bStatus = 0;
    protected $aPhoto = [];
    protected $nIdBenefactor = 0;
    protected $nIdUsuario = 0;

    private function setnIdDonacion($nIdDonacion){
        $this -> nIdDonacion = $nIdDonacion;
    }

    private function setnAmount($nAmount){
        $this -> nAmount = $nAmount;
    }

    private function setbStatus($bStatus){
        $this -> bStatus = $bStatus;
    }

    private function setaPhoto($aPhoto){
        $this -> aPhoto = $aPhoto;
    }

    private function setnIdBenefactor($nIdBenefactor){
        $this -> nIdBenefactor = $nIdBenefactor;
    }

    private function setnIdUsuario($nIdUsuario){
        $this -> nIdUsuario = $nIdUsuario;
    }

    private function getnIdDonacion(){
        return $this -> nIdDonacion;
    }

    private function getnAmount(){
        return $this -> nAmount;
    }

    private function getbStatus(){
        return $this -> bStatus;
    }

    private function getaPhoto(){
        return $this -> aPhoto;
    }

    private function getnIdBenefactor(){
        return $this -> nIdBenefactor;
    }

    private function getnIdUsuario(){
        return $this -> nIdUsuario;
    }
}
?>