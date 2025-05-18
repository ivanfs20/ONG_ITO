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
        
        //B-DONACIONES(MATERIAL)>READ BY NAME :Saul Lima Gonzalez
        public function readByName($id,$sName){
           $oAccesoDatos=new AccesoDatos();
            $sQuery="";
            $arrRS=null;
            $oMaterial=null;

            if($id<=0 || $sName==""){
                throw new Exception("message/Material/id nul||name null");
            }else{
                if($oAccesoDatos->conectar()){
                    $sQuery="SELECT * FROM DonacionMaterial WHERE nIdDonacion=".intval($id)." AND sName='".$sName."'";
                    $arrRS=$oAccesoDatos->consulta($sQuery);
                    $oAccesoDatos->desconectar();
                    if($arrRS && count($arrRS)>0){
                        $aLinea=$arrRS[0];
                        $oMaterial=new Material();
                        $oMaterial->nIdDonacion=$aLinea[0];
                        $oMaterial->sName=$aLinea[1];
                        $oMaterial->sDescription=$aLinea[2];
                        $oMaterial->aPhoto=$aLinea[3];
                        $oMaterial->nAmount=$aLinea[4];
                        $oMaterial->bStatus=$aLinea[5];
                        $oMaterial->nIdUsuario=$aLinea[6];
                        $oMaterial->nIdBenefactor=$aLinea[7];
                    };
                }
                return $oMaterial;
            }        
        }

}
?>