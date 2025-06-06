<?php
class Donacion{
    protected $nIdDonacion = 0;
    protected $nAmount = 0;
    protected $bStatus = 0;
    protected $aPhoto = [];
    protected $nIdBenefactor = 0;
    protected $nIdUsuario = 0;
    protected $dFechaCreacion=null;
    protected $sNameUser="";

    public function setnIdDonacion($nIdDonacion){
        $this -> nIdDonacion = $nIdDonacion;
    }

    public function setnAmount($nAmount){
        $this -> nAmount = $nAmount;
    }

    public function setbStatus($bStatus){
        $this -> bStatus = $bStatus;
    }

    public function setaPhoto($aPhoto){
        $this -> aPhoto = $aPhoto;
    }

    public function setnIdBenefactor($nIdBenefactor){
        $this -> nIdBenefactor = $nIdBenefactor;
    }

    public function setnIdUsuario($nIdUsuario){
        $this -> nIdUsuario = $nIdUsuario;
    }

    public function getnIdDonacion(){
        return $this -> nIdDonacion;
    }

    public function getnAmount(){
        return $this -> nAmount;
    }

    public function getbStatus(){
        return $this -> bStatus;
    }

    public function getaPhoto(){
        return $this -> aPhoto;
    }

    public function getnIdBenefactor(){
        return $this -> nIdBenefactor;
    }

    public function getnIdUsuario(){
        return $this -> nIdUsuario;
    }

    public function setdFechaCreacion($dFechaCreacion){
        $this->dFechaCreacion=$dFechaCreacion;
    }

    public function getdFechaCreacion(){
        return $this->dFechaCreacion;
    }

    public function setsNombreUser($sNameUser){
        $this->sNameUser=$sNameUser;
    }

    public function getsNombreUser(){
        return $this->sNameUser;
    }

            // B - DONACIONES (contar) : Carlos Iván Flores Sánchez
            public function countDonacion($tipo){
                $oAccesoDatos = new AccesoDatos();
                $bRet = false;
                $arrRS = null;
                $sQuery = "";
                try{
                    if($oAccesoDatos->conectar()){
                        if($tipo=="digital"){
                            $sQuery = "SELECT count(nIdDonacion) FROM donaciondigital WHERE bStatus=1";
                        }else{
                            $sQuery = "SELECT count(nIdDonacion) FROM donacionmaterial WHERE bStatus=1";
                        }
                        $valor = $oAccesoDatos->consulta($sQuery);
                        $oAccesoDatos->desconectar();
                    }
                }catch(Exception $e){
                }
                return $valor;
            }

}
?>