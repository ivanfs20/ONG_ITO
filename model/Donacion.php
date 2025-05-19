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
    

}
?>