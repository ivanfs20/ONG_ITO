<?php
class Benefactor{
    private $nIdBenefactor = 0;
    private $sName = "";
    private $sDescription = "";

    public function setnIdBenefactor($nIdBenefactor){
        $this -> nIdBenefactor = $nIdBenefactor;
    }

    public function setsName($sName){
        $this -> sName = $sName;
    }

    public function setsDescription($sDescription){
        $this -> sDescription = $sDescription;
    }

    public function getnIdBenefactor(){
        return $this -> nIdBenefactor;
    }

    public function getsName(){
        return $this -> sName;
    }

    public function getsDescription(){
        return $this -> sDescription;
    }
}
?>