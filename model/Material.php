<?php
include("Donacion.php");
require_once("AccesoDatos.php");
class Material extends Donacion{
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
        //B - DONACIONES (MATERIAL) -> CREATE:Saul Lima Gonzalez
        public function Create(){
            $oAccesoDatos=new AccesoDatos();
            $arrRS=null;
            $oBret=null;
            $sQuery="";
            if(empty($this->sName) || empty($this->sDescription) || empty($this->aPhoto[0])
            || $this->nAmount<=0 || $this->nIdUsuario<=0 || $this->nIdBenefactor<=0){
                throw new Exception("message/model/Material/campos vacios,no se puede proceder a la ejecucion");

            }else{
                $photoToBinary=addslashes($this->aPhoto[0]);
                $sQuery="INSERT INTO DonacionMaterial (sName,sDescription,aPhoto,nAmount,bStatus,nIdUsuario,nIdBenefactor)
                VALUES ('".$this->sName."' , '".$this->sDescription."', '".$photoToBinary."' ,".intval($this->nAmount)."
                ,0,".intval($this->nIdUsuario).",".intval($this->nIdBenefactor).")";
                $arrRS=$oAccesoDatos->comando($sQuery);
                $oAccesoDatos->desconectar();
                if ($arrRS>0){
                    $oBret=true;
             }
                
            }
                return $oBret;

        }   
}
?>