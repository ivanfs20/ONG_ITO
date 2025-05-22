<?php
class Donacion{
    protected $nIdDonacion = 0;
    protected $nAmount = 0;
    protected $bStatus = 0;
    protected $aPhoto = [];
    protected $nIdBenefactor = 0;
    protected $nIdUsuario = 0;

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

    // B - DONACION -> READ BY ID : Morales de Jesus Jesus Antonio
    public function readById($id){
        $oAccesoDatos = new AccesoDatos();
        $sQuery = "";
        $arrRS = null;
        $oDonacion = null;

        if($id==0){throw new Exception("/m/Donacion/byId/id");}
        else{
            if($oAccesoDatos -> conectar()){
                $sQuery = "SELECT * FROM Donacion WHERE nIdDonacion=".intval($id);
                $arrRS = $oAccesoDatos -> consulta($sQuery);
                $oAccesoDatos -> desconectar();
                if($arrRS && count($arrRS)>0){
                        $fila = $arrRS[0];
                        $oDonacion = new Donacion();
                        $oDonacion -> nIdDonacion = $fila[0];
                        $oDonacion -> nAmount = $fila[1];
                        $oDonacion -> bStatus = $fila[2];
                        $oDonacion -> aPhoto = null;//json_decode($fila[3]);
                        $oDonacion -> nIdBenefactor = $fila[4];
                        $oDonacion -> nIdUsuario = $fila[5];
                };
            }
        }
        return $oDonacion;
    }

    // B - DONACIONES (ALL) -> READALL : Morales de Jesus Jesus Antonio

    public static function readAll() {
        $oAccesoDatos = new AccesoDatos();
        $aDonaciones = [];
        
        try {
            if ($oAccesoDatos->conectar()) {
                $sQuery = "SELECT * FROM Donacion ORDER BY nIdDonacion DESC";
                $arrRS = $oAccesoDatos->consulta($sQuery);
                
                if ($arrRS && count($arrRS) > 0) {
                    foreach ($arrRS as $fila) {
                        $oDonacion = new Donacion();
                        $oDonacion->setnIdDonacion($fila[0] ?? 0);
                        $oDonacion->setnAmount($fila[1] ?? 0);
                        $oDonacion->setbStatus($fila[2] ?? false);
                        $oDonacion->setaPhoto([]); // O json_decode($fila[3])
                        $oDonacion->setnIdBenefactor($fila[4] ?? 0);
                        $oDonacion->setnIdUsuario($fila[5] ?? 0);
                        
                        $aDonaciones[] = $oDonacion;
                    }
                }
            }
        } catch (Exception $e) {
            throw new Exception("m/Donacion/readAll/Error: ".$e->getMessage());
        } finally {
            $oAccesoDatos->desconectar();
        }
        
        return $aDonaciones;
    }


    // B - DONACIONES (material) -> UPDATE : Morales de Jesus Jesus Antonio
    public function updateMaterial($sName, $sDescription, $aPhoto, $nAmount) {
        if ($this->bStatus) {
            throw new Exception("Donacion->updateMaterial: No se puede modificar una donación validada (status = true)");
        }

        if (empty(trim($sName))) {
            throw new Exception("Donacion->updateMaterial: El nombre del material es requerido");
        }

        if (empty(trim($sDescription))) {
            throw new Exception("Donacion->updateMaterial: La descripción es requerida");
        }

        if (empty($aPhoto)) {
            throw new Exception("Donacion->updateMaterial: La foto es requerida");
        }

        if (!is_numeric($nAmount) || $nAmount <= 0) {
            throw new Exception("Donacion->updateMaterial: El monto/cantidad debe ser un número positivo");
        }

        $oAccesoDatos = new AccesoDatos();
        $bRet = false;

        try {
            if ($oAccesoDatos->conectar()) {
                $sQuery = "UPDATE Donacion SET 
                        nAmount = ".intval($nAmount).",
                        aPhoto = '".addslashes($aPhoto[0])."'
                        WHERE nIdDonacion = ".intval($this->nIdDonacion)." AND bStatus = 0";
                
                $nAfectados = $oAccesoDatos->comando($sQuery);
                
                if ($nAfectados > 0) {
                    $sQueryMaterial = "UPDATE DonacionMaterial SET
                                    sName = '".addslashes($sName)."',
                                    sDescription = '".addslashes($sDescription)."'
                                    WHERE nIdDonacion = ".intval($this->nIdDonacion);
                    
                    $nAfectadosMaterial = $oAccesoDatos->comando($sQueryMaterial);
                    $bRet = ($nAfectadosMaterial > 0);
                }
            }
        } catch (Exception $e) {
            throw new Exception("Donacion->updateMaterial: Error en la actualización - ".$e->getMessage());
        } finally {
            $oAccesoDatos->desconectar();
        }

        if ($bRet) {
            $this->nAmount = $nAmount;
            $this->aPhoto = $aPhoto;
        }

        return $bRet;
    }

    // B - DONACIONES (TARJETA) -> READ BY TITLE : Morales de Jesus Jesus Antonio
    public static function readByTitle($sTitle) {
        if (empty(trim($sTitle))) {
            throw new Exception("Donacion->readByTitle: El título es requerido");
        }

        $oAccesoDatos = new AccesoDatos();
        $oDonacion = null;

        try {
            if ($oAccesoDatos->conectar()) {
                $sQuery = "SELECT * FROM Donacion WHERE sTitle = '".addslashes($sTitle)."'";
                $arrRS = $oAccesoDatos->consulta($sQuery);

                if ($arrRS && count($arrRS) > 0) {
                    $fila = $arrRS[0];
                    $oDonacion = new Donacion();
                    $oDonacion->setnIdDonacion($fila[0] ?? 0);
                    $oDonacion->setnAmount($fila[1] ?? 0);
                    $oDonacion->setbStatus($fila[2] ?? false);
                    $oDonacion->setaPhoto([]); // O json_decode($fila[3])
                    $oDonacion->setnIdBenefactor($fila[4] ?? 0);
                    $oDonacion->setnIdUsuario($fila[5] ?? 0);
                }
            }
        } catch (Exception $e) {
            throw new Exception("Donacion->readByTitle: Error al obtener la donación - ".$e->getMessage());
        } finally {
            $oAccesoDatos->desconectar();
        }

        return $oDonacion;
    }

}
?>