<?php
include_once("AccesoDatos.php");
class Proyecto{
    private $nIdProyecto = 0;
    private $sTitle = "";
    private $sDescription = "";
    private $aPhoto = [];
    private $nIdUsuario = 0;
    private $nIdBenefactor = 0;

    public function setnIdProyecto($nIdProyecto){
        $this -> nIdProyecto = $nIdProyecto;
    }

    public function setsTitle($sTitle){
        $this -> sTitle = $sTitle;
    }

    public function setsDescription($sDescription){
        $this -> sDescription = $sDescription;
    }

    public function setaPhoto($aPhoto){
        $this -> aPhoto = $aPhoto;
    }

    public function setnIdUsuario($nIdUsuario){
        $this -> nIdUsuario = $nIdUsuario;
    }

    public function setnIdBenefactor($nIdBenefactor){
        $this -> nIdBenefactor = $nIdBenefactor;
    }

    public function getnIdProyecto(){
        return $this -> nIdProyecto;
    }

    public function getsTitle(){
        return $this -> sTitle;
    }

    public function getsDescription(){
        return $this -> sDescription;
    }

    public function getaPhoto(){
        return $this -> aPhoto;
    }

    public function getnIdUsuario(){
        return $this -> nIdUsuario;
    }

    public function getnIdBenefactor(){
        return $this -> nIdBenefactor;
    }


    public function setsNameBenefactor($sNameBenefactor){
        return $this->sNameBenefactor=$sNameBenefactor;
    }

    public function getsNameBenefactor(){
        return $this->sNameBenefactor;
    }
    //B-PROYECTOS (CAMPAÑAS)-> CREATE:Saul Lima Gonzalez
    public function create(){
        $oAccesoDatos = new AccesoDatos();
        $bRet = false;
    
        if (
            empty($this->sTitle) ||
            empty($this->sDescription) ||
            empty($this->aPhoto) ||
            $this->nIdUsuario <= 0 ||
            $this->nIdBenefactor <= 0
        ) {
            throw new Exception("message/Proyecto/Create/sTitle,sDescription,aPhoto,nIdUsuario,nIdBenefactor");
        } else {
            $photoToBinary = addslashes($this->aPhoto);
            if ($oAccesoDatos->conectar()) {  // <-- conectar primero
                $sQuery = "INSERT INTO Proyecto (sTitle, sDescription, aPhoto, nIdUsuario, nIdBeneficiario)
                           VALUES ('".$this->sTitle."', '".$this->sDescription."', '".$photoToBinary."', "
                           .intval($this->nIdUsuario).", ".intval($this->nIdBenefactor).")";
    
                $arrRS = $oAccesoDatos->comando($sQuery);
                $oAccesoDatos->desconectar();
    
                if ($arrRS > 0) {
                    $bRet = true;
                }
            } else {
                throw new Exception("No se pudo conectar a la base de datos");
            }
        }
    
        return $bRet;
    }
    

    public function update() {
        $oAccesoDatos = new AccesoDatos();
        $sQuery = "";
        $bRet = false;
        $arrRS = null;
    
        if (
            $this->nIdProyecto <= 0 ||
            empty($this->sTitle) ||
            empty($this->sDescription) ||
            $this->nIdUsuario <= 0 ||
            $this->nIdBenefactor <= 0 ||
            empty($this->aPhoto)
        ) {
            throw new Exception("message/Proyecto/Update/nIdProyecto, sTitle, sDescription, aPhoto, nIdUsuario, nIdBeneficiario");
        }
    
        $photoToBinary = addslashes($this->aPhoto);
    
        if ($oAccesoDatos->conectar()) {
            $sQuery = "UPDATE Proyecto SET 
                        sTitle = '" . addslashes($this->sTitle) . "',
                        sDescription = '" . addslashes($this->sDescription) . "',
                        aPhoto = '" . $photoToBinary . "',
                        nIdUsuario = " . intval($this->nIdUsuario) . ",
                        nIdBeneficiario = " . intval($this->nIdBenefactor) . "
                       WHERE nIdProyecto = " . intval($this->nIdProyecto) . ";";
    
            $arrRS = $oAccesoDatos->comando($sQuery);
            $oAccesoDatos->desconectar();
    
            if ($arrRS > 0) {
                $bRet = true;
            }
        }
    
        return $bRet;
    }
    
    

    //B-PROYECTOS (CAMPAÑAS)->DELETE BY TITLE :Saul Lima Gonzalez
    public function deleteByTitle($id,$sTitle){
            $oAccesoDatos=new AccesoDatos();
            $sQuery="";
            $bRet=false;
            $arrRS=null;
            if($id<=0 || empty($sTitle)){
                throw new  Exception("message/Proyecto/titulo o ids nulos o vacios");                
            }else{
                $sQuery="DELETE FROM Proyecto WHERE nIdProyecto=".intval($id)."AND sTitle='".$sTitle."'";
                $arrRS=$oAccesoDatos->comando($sQuery);
                $oAccesoDatos->desconectar();
                if($arrRS>0){
                    $bRet=true;
                }
            }
            return $bRet;
    }

    //B - PROYECTOS (CAMPAÑAS) -> DELETE BY ID : Morales de Jesus Jesus Antonio
    public function deleteById($id){
        $oAccesoDatos = new AccesoDatos();
        $sQuery = "";
        $bRet = false;
        $arrRS = null;

        if ($id <= 0) {
            throw new Exception("message/Proyecto/ID nulo o inválido");
        } else {
            if($oAccesoDatos->conectar()){
                $sQuery = "DELETE FROM Proyecto WHERE nIdProyecto = " . intval($id);
                $arrRS = $oAccesoDatos->comando($sQuery);
            }
            $oAccesoDatos->desconectar();
            if ($arrRS > 0) {
                $bRet = true;
            }
        }
        return $bRet;
    }

    //B - PROYECTOS (CAMPAÑAS) -> READ BY ID : Morales de Jesus Jesus Antonio
    
    
    public static function getById($nIdProyecto) {
        if (!is_numeric($nIdProyecto) || $nIdProyecto <= 0) {
            throw new Exception("m/Proyecto/getById/ID inválido");
        }

        $oAccesoDatos = new AccesoDatos();
        $oProyecto = null;

        try {
            if ($oAccesoDatos->conectar()) {
                $sQuery = "SELECT * FROM Proyecto WHERE nIdProyecto = ".intval($nIdProyecto);
                $arrRS = $oAccesoDatos->consulta($sQuery);
                
                if ($arrRS && count($arrRS) > 0) {
                    $fila = $arrRS[0];
                    $oProyecto = new Proyecto();
                    
                    $oProyecto->setnIdProyecto($fila[0] ?? 0);
                    $oProyecto->setsTitle($fila[1] ?? '');
                    $oProyecto->setsDescription($fila[2] ?? '');
                    $oProyecto->setaPhoto($fila[3] ?? []);
                    $oProyecto->setnIdUsuario($fila[4] ?? 0);
                    $oProyecto->setnIdBenefactor($fila[5] ?? 0);
                }
            }
        } catch (Exception $e) {
            throw new Exception("m/Proyecto/getById/Error: ".$e->getMessage());
        } finally {
            $oAccesoDatos->desconectar();
        }

        return $oProyecto;
    }
    //B-PROYECTOS(CAMPAÑAS)>READ BY TITLE : Saul Lima Gonzalez
    public function readByTitle($id,$sTitle){
        $oAccesoDatos=new AccesoDatos();
        $sQuery="";
        $arrRS=0;
        $oProyecto=null;
        if($id<=0 || empty($sName)){
            throw new  Exception("message/Proyecto(Campaña)/id null||title null");
        }else{
            if($oAccesoDatos->conectar()){
                $sQuery="SELECT * FROM Proyecto WHERE nIdProyecto=".intval($id)." AND sTtitle='".$sTitle."'";
                $arrRS=$oAccesoDatos->consulta($sQuery);
                $oAccesoDatos->desconectar();
                if($arrRS && count($arrRS)>0){
                    $aLinea=$arrRS[0];
                    $oProyecto=new Proyecto();
                    $oProyecto->nIdProyecto=$aLinea[0];
                    $oProyecto->sTitle=$aLinea[1];
                    $oProyecto->sDescription=$aLinea[2];
                    $oProyecto->aPhoto=$aLinea[3];
                    $oProyecto->nIdUsuario=$aLinea[4];
                    $oProyecto->nIdBenefactor=$aLinea[5];
                };
            }
        }
        return $oProyecto;
    }

    //B-PROYECTOS(CAMPAÑAS)->READ ALL : Saul Lima Gonzalez
    public function readAll(){
        $oAccesoDatos = new AccesoDatos();
        $sQuery = "";
        $arrRS = 0;
        $arrProyectos = [];
        $nCount = 0;
    
        if ($oAccesoDatos->conectar()) {
            $sQuery = "SELECT p.nIdProyecto, p.sTitle, p.sDescription, p.aPhoto, p.nIdUsuario, b.sName FROM Proyecto p INNER JOIN Beneficiario b ON p.nIdBeneficiario=b.nIdBeneficiario";
            $arrRS = $oAccesoDatos->consulta($sQuery);
            $oAccesoDatos->desconectar();
    
            if ($arrRS && count($arrRS) > 0) {
                foreach ($arrRS as $aLinea) {
                    $oProyecto = new Proyecto();
                    $oProyecto->setnIdProyecto($aLinea[0]);
                    $oProyecto->setsTitle($aLinea[1]);
                    $oProyecto->setsDescription($aLinea[2]);
                    $oProyecto->setaPhoto($aLinea[3]);
                    $oProyecto->setnIdUsuario($aLinea[4]);
                    $oProyecto->setsNameBenefactor($aLinea[5]);
    
                    $arrProyectos[$nCount] = $oProyecto;
                    $nCount++;
                }
            }
        }
    
        return $arrProyectos;
    }

       
}

?>