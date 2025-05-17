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

    //B - DONACIONES (TARJETA) -> UPDATE : Saul Lima Gonzale
    public function update(){
        $oAccesoDatos=new AccesoDatos();
        $sQuery="";
        $nAfectados=-1;
        
        if($this->bStatus==1 || empty($this->aPhoto[0])){
            throw new Exception("message/Digital/update/la donacion ya fue validada||foto vacia");
        }else{
            if(intval($this->nFolio)<=0 || empty($this->sMethod) || $this->nAmount<=0
               || $this->nIdUsuario<=0 || $this->nIdBenefactor<=0){
                throw new  Exception("message/Digital/update/nFolio||sMethod||nAmount||nIdUsuario||nIdBenefactor");
            }else{
                if($oAccesoDatos->conectar()){
                    $photoToBinary=addslashes($this->aPhoto[0]);
                    $sQuery="UPDATE DonacionDigital SET
                    nFolio =".intval($this->nFolio).",
                    sMethod ='".$this->sMethod."',
                    aPhoto='".$photoToBinary."',
                    nAmount =".intval($this->nAmount)
                    .", nIdUsuario =".intval($this->nIdUsuario).",
                    nIdBenefactor =".intval($this->nIdBenefactor).
                    "WHERE nIdDonacion = ".intval($this->nIdDonacion);
                    $nAfectados=$oAccesoDatos->comando($sQuery);
                    $oAccesoDatos->desconectar();
                }
            }
        }
        return $nAfectados;      

    }

}
?>