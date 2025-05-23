<?php
require_once 'Donacion.php';
require_once("AccesoDatos.php");
class Material extends Donacion{
    private $sName = "";
    private $sDescription = "";
    private $sNameBenefactor="";
    

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

    public function setsNameBenefactor($sNameBenefactor){
        return $this->sNameBenefactor=$sNameBenefactor;
    }

    public function getsNameBenefactor(){
        return $this->sNameBenefactor;
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

        //B- DONACIONES (MATERIAL) READ MATERIAL:Saul Lima Gonzalez
        public function readMaterial()
{       
    $oAccesoDatos = new AccesoDatos();
    $sQuery = "";
    $arrRS = [];
    $arrMaterial = [];
    
    if ($oAccesoDatos->conectar()) {
        $sQuery = "SELECT * FROM DonacionMaterial";
        $arrRS = $oAccesoDatos->consulta($sQuery);
        $oAccesoDatos->desconectar();
        if ($arrRS && count($arrRS) > 0) {
            foreach ($arrRS as $aFila) {
                $oMaterial = new Material();                
                $oMaterial->setnIdDonacion($aFila[0]);                
                $oMaterial->setsName($aFila[1]);
                $oMaterial->setsDescription($aFila[2]);
                $oMaterial->setaPhoto($aFila[3]);
                $oMaterial->setnAmount($aFila[4]);
                $oMaterial->setbStatus($aFila[5]);
                $oMaterial->setdFechaCreacion($aFila[6]);
                $oMaterial->setnIdUsuario($aFila[7]);
                $oMaterial->setnIdBenefactor($aFila[8]);
                $arrMaterial[] = $oMaterial;
            }
        }
    }
    return $arrMaterial;        
}

    //B- DONACIONES (MATERIAL)-> READ WITH INNER JOIN:Saul Lima Gonzalez
    public function readByJoin()
{       
    $oAccesoDatos = new AccesoDatos();
    $sQuery = "";
    $arrRS = [];
    $arrMaterial = [];
    
    if ($oAccesoDatos->conectar()) {       
                                               
                $sQuery="SELECT b.sName,d.sName,d.sDescription,d.nAmount,d.dateCreacion,u.sNombreC,d.aPhoto
                FROM Usuario u INNER JOIN DonacionMaterial d ON u.nIdUsuario=d.nIdUsuario
                INNER JOIN Benefactor b ON d.nIdBenefactor=b.nIdBenefactor WHERE d.dateCreacion BETWEEN 
                DATE_SUB(CURDATE(), INTERVAL 1 MONTH) AND CURDATE()" ;
                $arrRS=$oAccesoDatos->consultaJoin($sQuery);
                $oAccesoDatos->desconectar();
                if ($arrRS && count($arrRS) > 0) {
                foreach($arrRS as $aFila){                
                $oMaterial = new Material();
                
                //$oMaterial->setaPhoto($aFila[0]);      
                $oMaterial->setsNameBenefactor($aFila[0]);
                $oMaterial->setsName($aFila[1]);
                $oMaterial->setsDescription($aFila[2]);
                $oMaterial->setnAmount($aFila[3]);
                $oMaterial->setdFechaCreacion($aFila[4]);
                $oMaterial->setsNombreUser($aFila[5]);
                $oMaterial->setaPhoto($aFila[6]);
                        
                              
                $arrMaterial[] = $oMaterial;
                }
                
                }         
        
    }
    return $arrMaterial;        
}
}
?>