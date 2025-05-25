<?php
require_once 'Donacion.php';
require_once 'AccesoDatos.php';
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
            $this->dFechaCreacion=date('Y-m-d');
            $sQuery = "INSERT INTO DonacionDigital (nFolio, sMethod, aPhoto, nAmount, bStatus,dateCreacion, nIdUsuario, nIdBenefactor) 
            VALUES (".intval($this->nFolio).", "."'".$this->sMethod."', "."'".$fotoBinaria."', ".
            intval($this->nAmount).", "."0, '".$this->dFechaCreacion."' ,".$this.intval($this->nIdUsuario).", ".intval($this->nIdBenefactor).")";
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




    //B- DONACIONES (TARJETAS)-> READ WITH INNER JOIN:Saul Lima Gonzalez
    public function readByJoin()
{       
    $oAccesoDatos = new AccesoDatos();
    $sQuery = "";
    $arrRS = [];
    $arrDigital = [];
    
    if ($oAccesoDatos->conectar()) {
        $sQuery = "SELECT u.sNombreC,d.nAmount,d.nFolio,d.dateCreacion, d.bStatus FROM DonacionDigital d
                   INNER JOIN Usuario u ON d.nIdUsuario=u.nIdUsuario WHERE d.dateCreacion BETWEEN 
                    DATE_SUB(CURDATE(), INTERVAL 1 MONTH) AND CURDATE() ORDER BY d.dateCreacion DESC";
        $arrRS = $oAccesoDatos->consulta($sQuery);
        $oAccesoDatos->desconectar();
        if ($arrRS && count($arrRS) > 0) {
            foreach ($arrRS as $aFila) {                
                $oDigital = new Digital();                
                $oDigital->setsNombreUser($aFila[0]);
                $oDigital->setnAmount($aFila[1]);
                $oDigital->setnFolio($aFila[2]);
                $oDigital->setdFechaCreacion($aFila[3]);
                $oDigital->setbStatus($aFila[4]);
                if($oDigital->getbStatus()==1){
                    $arrDigital[] = $oDigital;
                }
                
                
                
            }
        }
    }
    return $arrDigital;        
}

//B - DONACIONES (TARJETA) -> READ BY ID : Jesus Antonio Morales de Jesus   -> falto pasar parametro id (Saul Lima Gonzalez)
public function readById($id){
    $oAccesoDatos = new AccesoDatos();
    $sQuery = "";
    $arrRS = null;
    $arrDigital = null;

    if($this->nIdDonacion <= 0){
        throw new Exception("m/Digital/readById/nIdDonacion");
    }else{
        if($oAccesoDatos->conectar()){
            $sQuery = "SELECT nFolio, sMethod, aPhoto, nAmount, bStatus, dateCreacion, nIdUsuario, nIdBenefactor FROM DonacionDigital WHERE nIdDonacion = ".intval($id);
            $arrRS = $oAccesoDatos->consulta($sQuery);
            $oAccesoDatos->desconectar();
            if($arrRS && count($arrRS) > 0){
                foreach ($arrRS as $aFila) {
                    $oDigital = new Digital();
                    $oDigital->setnFolio($aFila[0]);
                    $oDigital->setsMethod($aFila[1]);
                    $oDigital->setaPhoto($aFila[2]);
                    $oDigital->setnAmount($aFila[3]);
                    $oDigital->setbStatus($aFila[4]);
                    $oDigital->setdFechaCreacion($aFila[5]);
                    $oDigital->setnIdUsuario($aFila[6]);
                    $oDigital->setnIdBenefactor($aFila[7]);
                    $arrDigital[] = $oDigital;
                }
            }
        }
    }
    return $arrDigital;
}

//B - DONACIONES (TARJETA) -> READ BY TITLE : Jesus Antonio Morales de Jesus
public function readByTitle($sTitle){
    $oAccesoDatos = new AccesoDatos();
    $sQuery = "";
    $arrRS = null;
    $arrDigital = null;

    if (empty($sTitle)) {
        throw new Exception("m/Digital/readByTitle/sTitle");
    } else {
        if ($oAccesoDatos->conectar()) {
            $sQuery = "SELECT nFolio, sMethod, aPhoto, nAmount, bStatus, dateCreacion, nIdUsuario, nIdBenefactor 
                       FROM DonacionDigital 
                       WHERE sTitle = '" . addslashes($sTitle) . "'";
            $arrRS = $oAccesoDatos->consulta($sQuery);
            $oAccesoDatos->desconectar();
            if ($arrRS && count($arrRS) > 0) {
                foreach ($arrRS as $aFila) {
                    $oDigital = new Digital();
                    $oDigital->setnFolio($aFila[0]);
                    $oDigital->setsMethod($aFila[1]);
                    $oDigital->setaPhoto($aFila[2]);
                    $oDigital->setnAmount($aFila[3]);
                    $oDigital->setbStatus($aFila[4]);
                    $oDigital->setdFechaCreacion($aFila[5]);
                    $oDigital->setnIdUsuario($aFila[6]);
                    $oDigital->setnIdBenefactor($aFila[7]);
                    $arrDigital[] = $oDigital;
                }
            }
        }
    }
    return $arrDigital;
}

}
?>