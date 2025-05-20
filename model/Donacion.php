<?php
class Donacion{
    protected $nIdDonacion = 0;
    protected $nAmount = 0;
    protected $bStatus = 0;
    protected $aPhoto = [];
    protected $nIdBenefactor = 0;
    protected $nIdUsuario = 0;

    private function setnIdDonacion($nIdDonacion){
        $this -> nIdDonacion = $nIdDonacion;
    }

    private function setnAmount($nAmount){
        $this -> nAmount = $nAmount;
    }

    private function setbStatus($bStatus){
        $this -> bStatus = $bStatus;
    }

    private function setaPhoto($aPhoto){
        $this -> aPhoto = $aPhoto;
    }

    private function setnIdBenefactor($nIdBenefactor){
        $this -> nIdBenefactor = $nIdBenefactor;
    }

    private function setnIdUsuario($nIdUsuario){
        $this -> nIdUsuario = $nIdUsuario;
    }

    private function getnIdDonacion(){
        return $this -> nIdDonacion;
    }

    private function getnAmount(){
        return $this -> nAmount;
    }

    private function getbStatus(){
        return $this -> bStatus;
    }

    private function getaPhoto(){
        return $this -> aPhoto;
    }

    private function getnIdBenefactor(){
        return $this -> nIdBenefactor;
    }

    private function getnIdUsuario(){
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


    // B - DONACIONES (material) -> UPDATE : Morales de Jesus Jesus Antonio
    
    public function update($sName, $sDescription, $aPhoto, $nAmount) {
        if (empty(trim($sName))) {
            throw new Exception("Donacion->update: El nombre del material es requerido");
        }

        if (empty(trim($sDescription))) {
            throw new Exception("Donacion->update: La descripción es requerida");
        }

        if (empty($aPhoto)) {
            throw new Exception("Donacion->update: La foto es requerida");
        }

        if (!is_numeric($nAmount) || $nAmount <= 0) {
            throw new Exception("Donacion->update: El monto/cantidad debe ser un número positivo");
        }

        $oAccesoDatos = new AccesoDatos();
        $bRet = false;

        try {
            if ($oAccesoDatos->conectar()) {
                $sQuery = "UPDATE Donacion SET 
                        nAmount = ".intval($nAmount).",
                        aPhoto = '".addslashes($aPhoto[0])."'
                        WHERE nIdDonacion = ".intval($this->nIdDonacion);
                
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
            throw new Exception("Donacion->update: Error en la actualización - ".$e->getMessage());
        } finally {
            $oAccesoDatos->desconectar();
        }

        if ($bRet) {
            $this->nAmount = $nAmount;
            $this->aPhoto = $aPhoto;
        }

        return $bRet;
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
                        $oDonacion->setaPhoto([]); // O json_decode($fila[3]) si manejas fotos
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

}
?>