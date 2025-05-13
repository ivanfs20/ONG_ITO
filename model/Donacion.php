<?php
public class Donacion{
    private $nIdDonacion = 0;
    private $nAmount = 0;
    private $bStatus = false;
    private $aPhoto = [];
    private $nIdBenefactor = 0;

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
}
?>