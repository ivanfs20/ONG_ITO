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


    // B - BENEFACTOR -> DELETE BY NAME : Carlos Iván Flores Sánchez
    public function deleteByName($id,$sName){
        $oAccesoDatos = new AccesoDatos();
        $sQuery = "";
        $arrRS = 0;
        $bRet = false;

        if($id<=0 && empty($sName)){throw new Exception("m/Benefactor/deleteByName/$id&&$sName");}
        else{
            $sQuery = "DELETE FROM Benefactor b WHERE b.nIdBenefactor=".intval($id)." AND b.sName= '$sName'";
            $arrRS = $oAccesoDatos -> comando($sQuery);
            $oAccesoDatos -> desconectar();
            if($arrRS>0){
                $bRet = true;
            }
        }
        return $bRet;
    }

    //B-BENEFACTOR->READ BY NAME: Saul Lima González
    public function readByName($id,$sNombre){
        $oAccesoDatos=new AccesoDatos();
        $sQuery="";
        $arrRS=0;        
        if($id<=0 || empty($sNombre)){
            throw new Exception ("message/Benefactor/id o nombre nulos");
        }else{
            if($oAccesoDatos->conectar()){
                $sQuery="SELECT * FROM Benefactor WHERE nIdBenefactor=".intval($id)."AND sName='".$sNombre."'";
            $arrRS=$oAccesoDatos->consulta($sQuery);
            $oAccesoDatos->desconectar();
            if($arrRS && count($arrRS)>0){
                $fila=$arrRS[0];
                $oBenefactor=new Benefactor();
                $oBenefactor->nIdBenefactor=$fila[0];
                $oBenefactor->sName=$fila[1];
                $oBenefactor->sDescription=$fila[2];

            };
            }
            
            return $oBenefactor;
        }
    }

    //B-BENEFACTOR->DELETE BY ID:Saul Lima Gonzalez
    public function deleteById($id){
        $oAccesoDatos=new AccesoDatos();
        $sQuery="";
        $arrRS=0;
        $bRet=false;
        if($id<=0 || $id==null){
            throw new Exception("message/Benefactor/deleteById/id nulo o menor que 0");
        }else{
            $sQuery="DELETE FROM Benefactor WHERE nIdBenefactor=".intval($id);
            $arrRS=$oAccesoDatos->comando($sQuery);
            $oAccesoDatos->desconectar();
            if($arrRS>0){
                $bRet=true;
            }
        }
        return $bRet;

    }

    //B-BENEFACTOR->UPDATE :Saul ima Gonzalez
    public function update(){
        $oAccesoDatos=new AccesoDatos();
        $sQuery="";
        $nAfectados=-1;
        if ($this->nIdBenefactor<0 || $this->nIdBenefactor==0 || empty($this->sName) || empty($this->sDescription)){
            throw new Exception("message/Benefactor/Update/campos nulos,vacios o invalidos");
        }else{
            if($oAccesoDatos->conectar()){
               $sQuery = "UPDATE Benefactor SET 
                nIdBenefactor = " . intval($this->nIdBenefactor) . ",
                sName = '" . $this->sName . "',
                sDescription = '" . $this->sDescription . "' 
                 WHERE nIdBenefactor = " . intval($this->nIdBenefactor);
                $nAfectados=$oAccesoDatos->comando($sQuery);
                $oAccesoDatos->desconectar();
            }
        }
        return $nAfectados;
    }

    // B - BENEFACTOR -> READALL : Morales de Jesus Jesus Antonio

    public function getAll() {
        $oAccesoDatos = new AccesoDatos();
        $sQuery = "";
        $arrRS = null;
        $oBenefactor = null;
        $arrBenefactores = [];
        $nCount = 0;
        try {
            if ($oAccesoDatos->conectar()) {
                $sQuery = "SELECT * FROM Benefactor";
                $arrRS = $oAccesoDatos->consulta($sQuery);
                $oAccesoDatos->desconectar();
                
                if ($arrRS) {
                    foreach ($arrRS as $fila) {
                        $oBenefactor = new Benefactor();
                        $oBenefactor->setnIdBenefactor($fila[0]);
                        $oBenefactor->setsName($fila[1]);
                        $oBenefactor->setsDescription($fila[2]);
                        
                        $arrBenefactores[$nCount] = $oBenefactor;
                        $nCount++;
                    }
                }
            }
        } catch (Exception $e) {
            throw $e;
        }
        
        return $arrBenefactores;
    }

    // B - BENEFACTOR -> INSERT : Morales de Jesus Jesus Antonio

    public function insert() {
        $oAccesoDatos = new AccesoDatos();
        $sQuery = "";
        $nAfectados = -1;
        
        if (empty($this->sName) || empty($this->sDescription)) {
            throw new Exception("message/Benefactor/datos vacios");
        } else {
            if ($oAccesoDatos->conectar()) {
                $sQuery = "INSERT INTO Benefactor (sName, sDescription) VALUES ('".$this->sName."', '".$this->sDescription."')";
                $nAfectados = $oAccesoDatos->comando($sQuery);
                $oAccesoDatos->desconectar();
            }
        }
        
        return $nAfectados;
    }

    

}
?>