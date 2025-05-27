<?php
require_once 'Donacion.php';
include_once("AccesoDatos.php");
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
        $sQuery = "SELECT * FROM DonacionMaterial where bStatus=1";
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
                                               
                $sQuery="SELECT b.sName,d.sName,d.sDescription,d.nAmount,d.dateCreacion,u.sNombreC,d.aPhoto, d.bStatus
                FROM Usuario u INNER JOIN DonacionMaterial d ON u.nIdUsuario=d.nIdUsuario
                INNER JOIN Beneficiario b ON d.nIdBenefactor=b.nIdBenefactor WHERE d.dateCreacion BETWEEN 
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
                $oMaterial->setbStatus($aFila[7]);
                if($oMaterial->getbStatus()==1){                
                $arrMaterial[] = $oMaterial;
                }
                
                        
                              
                
                }
                
                }         
        
    }
    return $arrMaterial;        
}

//B - DONACIONES (MATERIAL) -> UPDATE : Jesus Antonio Morales de Jesus
public function updateMaterial($sName, $sDescription, $aPhoto, $nAmount){
    $oAccesoDatos = new AccesoDatos();
    $sQuery = "";
    $arrRS = null;

    if (empty($sName) || empty($sDescription) || empty($aPhoto[0]) || $nAmount <= 0) {
        throw new Exception("Material/updateMaterial: Campos vacíos o nulos");
    }

    $this->setsName($sName);
    $this->setsDescription($sDescription);
    $this->setaPhoto($aPhoto);
    $this->setnAmount($nAmount);

    if ($oAccesoDatos->conectar()) {
        $photoToBinary = addslashes($aPhoto[0]);
        $sQuery = "UPDATE DonacionMaterial 
                   SET sName = '".$this->getsName()."', 
                       sDescription = '".$this->getsDescription()."', 
                       aPhoto = '".$photoToBinary."', 
                       nAmount = ".intval($this->getnAmount())." 
                   WHERE nIdDonacion = ".intval($this->getnIdDonacion());
        
        $arrRS = $oAccesoDatos->comando($sQuery);
        $oAccesoDatos->desconectar();
    }

    return $arrRS > 0;
}

// B - DONACIONES (MATERIAL) -> READ BY ID : Jesus Antonio Morales de Jesus
public function readById($id){
    $oAccesoDatos = new AccesoDatos();
    $sQuery = "";
    $arrRS = null;
    $oMaterial = null;

    if ($id <= 0) {
        throw new Exception("message/model/Material/ID no puede ser 0 o menor");
    }

    if ($oAccesoDatos->conectar()) {
        $sQuery = "SELECT * FROM DonacionMaterial WHERE nIdDonacion = " . intval($id);
        $arrRS = $oAccesoDatos->consulta($sQuery);
        $oAccesoDatos->desconectar();

        if ($arrRS && count($arrRS) > 0) {
            $aLinea = $arrRS[0];
            $oMaterial = new Material();
            $oMaterial->setnIdDonacion($aLinea[0]);
            $oMaterial->setsName($aLinea[1]);
            $oMaterial->setsDescription($aLinea[2]);
            $oMaterial->setaPhoto($aLinea[3]);
            $oMaterial->setnAmount($aLinea[4]);
            $oMaterial->setbStatus($aLinea[5]);
            $oMaterial->setdFechaCreacion($aLinea[6]);
            $oMaterial->setnIdUsuario($aLinea[7]);
            $oMaterial->setnIdBenefactor($aLinea[8]);
        }
    }

    return $oMaterial;
}

}
?>