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


    // B - DONACIONES (TARJETA) -> CREATE : Carlos Iván Flores Sánchez
    public function create(){
        $oAccesoDatos = new AccesoDatos();
        $bRet = false;
        $arrRS = null;
        $sQuery = "";

        if($this -> nAmount <= 0 || empty($this->aPhoto[0])  || $this -> nIdBenefactor <=0 || $this -> nIdUsuario <= 0 || empty($this -> sMethod) || empty($this -> nFolio)){throw new Exception("m/Donacion/create/nIdDonacion&&nAmount&&aPhoto&&nIdBenefactor&&nIdUsuario&&sMethod&&nFolio");}
        else{
            $fotoBinaria = addslashes($this->aPhoto[0]);

            $sQuery = "INSERT INTO DonacionDigital (nFolio, sMethod, aPhoto, nAmount, bStatus, nIdUsuario, nIdBenefactor) 
            VALUES (".intval($this->nFolio).", "."'".$this->sMethod."', "."'".$fotoBinaria."', ".
            intval($this->nAmount).", "."0, ".intval($this->nIdUsuario).", ".intval($this->nIdBenefactor).")";
            $arrRS = $oAccesoDatos -> comando($sQuery);
            $oAccesoDatos -> desconectar();
            if($arrRS > 0){
                $bRet = true;
            }
        }
        return $bRet;
    }

}
?>