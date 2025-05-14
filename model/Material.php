<?php
include("Donacion")
public class Material extends Donacion{
    private $sName = "";
    private $sDescription = "";

    public function setsName($sName){
        $this -> sName = $sName;
    }

    public function setsDescription($sDescription){
        $this -> sDescription = $sDescription;
    }

    public function getsName(){
        return $this -> sName;
    }

    public function getsDescription(){
        return $this -> sDescription;
    }
}
?>