<?php
include("Donacion.php");
class Digital extends Donacion{
    private $sMethod = "";
    private $nFolio = "";

    public function setsMethod($sMethod){
        $this -> sMethod = $sMethod;
    }

    public function setnFolio($nFolio){
        $this -> nFolio = $nFolio;
    }

    public function getsMethod(){
        return $this -> sMethod;
    }

    public function getnFolio(){
        return $this -> nFolio;
    }
}
?>