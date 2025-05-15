<?php
include("AccesoDatos.php");

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


    //B - BENEFACTOR -> READ BY ID : Carlos Iván Flores Sánchez
    public function readById($id){
        $oAccesoDatos = new AccesoDatos();
        $sQuery = "";
        $arrRS = null;
        $oBenefactor = null;
        if($id==0){throw new Exception("/m/Benefactor/byId/id");}
        else{
            if($oAccesoDatos -> conectar()){
                $sQuery = "SELECT * FROM Benefactor WHERE nIdBenefactor=".intval($id);
                $arrRS = $oAccesoDatos -> consulta($sQuery);
                $oAccesoDatos -> desconectar();
                if($arrRS && count($arrRS)>0){
                        $fila = $arrRS[0];
                        $oBenefactor = new Benefactor();
                        $oBenefactor -> nIdBenefactor = $fila[0];
                        $oBenefactor -> sName = $fila[1];
                        $oBenefactor -> sDescription = $fila[2];
                };
            }
        }
        return $oBenefactor;
    }
}
?>