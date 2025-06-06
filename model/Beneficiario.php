<?php
include_once("AccesoDatos.php");

class Beneficiario{
    private $nIdBenefactor = 0;
    private $sName = "";
    private $sDescription = "";
    private $nIdProyecto = 0;
    private $sNameProyecto = "";


    public function setnIdProyecto($nIdProyecto){
        $this -> nIdProyecto = $nIdProyecto;
    }

    public function getnIdProyecto(){
        return $this -> nIdProyecto;
    }

    public function getsNameProyecto(){
        return $this -> sNameProyecto;
    }


    public function setsNameProyecto($sNameProyecto){
        $this -> sNameProyecto = $sNameProyecto;
    }

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
                $sQuery = "SELECT * FROM beneficiario WHERE nIdBeneficiario=".intval($id);
                $arrRS = $oAccesoDatos -> consulta($sQuery);
                $oAccesoDatos -> desconectar();
                if($arrRS && count($arrRS)>0){
                        $fila = $arrRS[0];
                        $oBenefactor = new Beneficiario();
                        $oBenefactor -> nIdBenefactor = $fila[0];
                        $oBenefactor -> sName = $fila[1];
                        $oBenefactor -> sDescription = $fila[2];
                        $oBenefactor -> nIdProyecto = $fila[3];
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
            $sQuery = "DELETE FROM beneficiario b WHERE b.nIdBeneficiario=".intval($id)." AND b.sName= '$sName'";
            $arrRS = $oAccesoDatos -> comando($sQuery);
            $oAccesoDatos -> desconectar();
            if($arrRS>0){
                $bRet = true;
            }
        }
        return $bRet;
    }

    //B-BENEFACTOR->READ BY NAME: Saul Lima González
    public function readByName($sNombre){
        $oAccesoDatos=new AccesoDatos();
        $sQuery="";
        $arrRS=0;        
        if( empty($sNombre)){
            throw new Exception ("message/Benefactor/id o nombre nulos");
        }else{
            if($oAccesoDatos->conectar()){
                $sQuery="SELECT * FROM beneficiario WHERE sName='".$sNombre."'";
            $arrRS=$oAccesoDatos->consulta($sQuery);
            $oAccesoDatos->desconectar();
             if ($arrRS && count($arrRS) > 0) {
                $fila = $arrRS[0];              
                
                $this->nIdBenefactor = $fila[0];
                $this->sName = $fila[1];
                $this->sDescription = $fila[2];
            } else {
                $this->nIdBenefactor = 0; 
            }
            }
            
            //return $oBenefactor;
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
            if($oAccesoDatos->conectar()){
            $sQuery="DELETE FROM beneficiario WHERE nIdBeneficiario=".intval($id);
            $arrRS=$oAccesoDatos->comando($sQuery);
            $oAccesoDatos->desconectar();
            if($arrRS>0){
                $bRet=true;
            }
        }
        }
        return $bRet;

    }

    //B-BENEFACTOR->UPDATE :Saul ima Gonzalez
    public function update(){
        $oAccesoDatos = new AccesoDatos();
        $sQuery = "";
        $nAfectados = -1;
        if ($this->nIdProyecto == 0 || $this->nIdBenefactor == 0 || empty($this->sName) || empty($this->sDescription)){
            throw new Exception("message/Benefactor/Update/campos nulos,vacios o invalidos");
        } else {
            if ($oAccesoDatos->conectar()) {
                $sQuery = "UPDATE beneficiario SET                 
                    sName = '" . $this->sName . "',
                    sDescription = '" . $this->sDescription . "',
                    nIdProyecto = " . intval($this->nIdProyecto) . "
                    WHERE nIdBeneficiario = " . intval($this->nIdBenefactor);
                $nAfectados = $oAccesoDatos->comando($sQuery);
                $oAccesoDatos->desconectar();
            }
        }
        return $nAfectados;
    }
    


    public function getAllByIdBeneficiario($id) {
        $oAccesoDatos = new AccesoDatos();
        $sQuery = "";
        $arrRS = null;
        $oBenefactor = null;
        $nCount = 0;
        try {
            if ($oAccesoDatos->conectar()) {
                $sQuery = "SELECT sName FROM beneficiario 
                 where nIdBeneficiario=".intval($id);
                $arrRS = $oAccesoDatos->consulta($sQuery);
                $oAccesoDatos->desconectar();
                
                if ($arrRS) {
                    foreach ($arrRS as $fila) {
                        $oBenefactor = new Beneficiario();
                        $oBenefactor->setsName($fila[0]);
                        
                    }
                }
            }
        } catch (Exception $e) {
            throw $e;
        }
        
        return $oBenefactor;
    }



    public function getAllById($id) {
        $oAccesoDatos = new AccesoDatos();
        $sQuery = "";
        $arrRS = null;
        $oBenefactor = null;
        $arrBenefactores = [];
        $nCount = 0;
        try {
            if ($oAccesoDatos->conectar()) {
                $sQuery = "SELECT b.nIdBeneficiario, b.sName, b.sDescription, p.sTitle FROM beneficiario b
                INNER JOIN proyecto p where b.nIdProyecto=p.".intval($id);
                $arrRS = $oAccesoDatos->consulta($sQuery);
                $oAccesoDatos->desconectar();
                
                if ($arrRS) {
                    foreach ($arrRS as $fila) {
                        $oBenefactor = new Beneficiario();
                        $oBenefactor->setnIdBenefactor($fila[0]);
                        $oBenefactor->setsName($fila[1]);
                        $oBenefactor->setsDescription($fila[2]);
                        $oBenefactor->setsNameProyecto($fila[3]);
                        
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
                $sQuery = "SELECT b.nIdBeneficiario, b.sName, b.sDescription, p.sTitle FROM beneficiario b
                INNER JOIN proyecto p where b.nIdProyecto=p.nIdProyecto;
                ";
                $arrRS = $oAccesoDatos->consulta($sQuery);
                $oAccesoDatos->desconectar();
                
                if ($arrRS) {
                    foreach ($arrRS as $fila) {
                        $oBenefactor = new Beneficiario();
                        $oBenefactor->setnIdBenefactor($fila[0]);
                        $oBenefactor->setsName($fila[1]);
                        $oBenefactor->setsDescription($fila[2]);
                        $oBenefactor->setsNameProyecto($fila[3]);
                        
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
        
        if (empty($this->sName) || empty($this->sDescription) || $this->nIdProyecto==0) {
            throw new Exception("message/Benefactor/datos vacios");
        } else {
            if ($oAccesoDatos->conectar()) {
                $sQuery = "INSERT INTO beneficiario (sName, sDescription, nIdProyecto) VALUES ('".$this->sName."', '".$this->sDescription."', '".$this->nIdProyecto."')";
                $nAfectados = $oAccesoDatos->comando($sQuery);
                $oAccesoDatos->desconectar();
            }
        }
        
        return $nAfectados;
    }

    //B-> Beneficiario >Obtener los beneficiarios de acuerdo al id del proyecto
    public function getAllByIdProject($id) {
        $oAccesoDatos = new AccesoDatos();
        $sQuery = "";
        $arrRS = null;
        $oBenefactor = null;
        $arrBenefactores = [];
        $nCount = 0;
        try {
            if ($oAccesoDatos->conectar()) {
                $sQuery = "SELECT * FROM Beneficiario WHERE nIdProyecto=".intval($id);
                $arrRS = $oAccesoDatos->consulta($sQuery);
                $oAccesoDatos->desconectar();
                
                if ($arrRS) {
                    foreach ($arrRS as $fila) {
                        $oBenefactor = new Beneficiario();
                        $oBenefactor->setnIdBenefactor($fila[0]);
                        $oBenefactor->setsName($fila[1]);
                        $oBenefactor->setsDescription($fila[2]);
                        $oBenefactor->setnIdProyecto($fila[3]);
                        
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


    

}
?>