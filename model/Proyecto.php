<?php
require_once("AccesoDatos.php");
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
    //B-PROYECTOS (CAMPAÑAS)-> CREATE:Saul Lima Gonzalez
    public function create(){ //-> los métodos inician con letra minuscula (Carlos Iván Flores Sánchez)
        $oAccesoDatos=new AccesoDatos();
        $sQuery="";
        $bRet=false;
        $arrRS=null;

        if($this->nIdProyecto<=0 || empty($this->sTitle) || empty($this->sDescription)
            || empty($this->aPhoto[0]) || $this->nIdUsuario<=0 || $this->nIdBenefactor<=0){
                throw new Exception("message/Proyecto/Create/nIdProyecto,
                sTitle,sDescription,aPhoto,nIdUsuario,nIdBenefactor");
        }else{
            $photoToBinary=addslashes($this->aPhoto[0]);
            $sQuery="INSERT INTO Proyecto (sTitle,sDescription,aPhoto,nIdUsuario,nIdBenefactor)
            VALUES ('".$this->sTitle."' , '".$this->sDescription."' , '".$photoToBinary."' ,"
            .intval($this->nIdUsuario)." , ".intval($this->nIdBenefactor).")";
            $arrRS=$oAccesoDatos->comando($sQuery);
            $oAccesoDatos->desconectar();
            if($arrRS>0){
                $bRet=true;
            }
        }
        return $bRet;
    }


    //B-PROYECTOS (CAMPAÑAS)-> UPDATE: Flores Sánchez Carlos Iván
    public function update(){
        $oAccesoDatos=new AccesoDatos();
        $sQuery="";
        $bRet=false;
        $arrRS=null;

        if($this->nIdProyecto<=0 || empty($this->sTitle) || empty($this->sDescription || $this->nIdUsuario<=0 || $this->nIdBenefactor|| $this->aPhoto == [])
            || empty($this->aPhoto[0]) || $this->nIdUsuario<=0 || $this->nIdBenefactor<=0){
                throw new Exception("message/Proyecto/Create/nIdProyecto,
                sTitle,sDescription,aPhoto,nIdUsuario,nIdBenefactor");
        }else{
            $photoToBinary=addslashes($this->aPhoto[0]);
            $sQuery = "UPDATE Proyecto SET sTitle = '".$this->sTitle."',
            sDescription = '".$this->sDescription."',
            aPhoto = '".$photoToBinary."',
            nIdUsuario = ".intval($this->nIdUsuario).",
            nIdBenefactor = ".intval($this->nIdBenefactor)."
            WHERE nIdProyecto = ".intval($this->nIdProyecto).";"; 
            $arrRS=$oAccesoDatos->comando($sQuery);
            $oAccesoDatos->desconectar();
            if($arrRS>0){
                $bRet=true;
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
            $sQuery = "DELETE FROM Proyecto WHERE nIdProyecto = " . intval($id);
            $arrRS = $oAccesoDatos->comando($sQuery);
            $oAccesoDatos->desconectar();
            if ($arrRS > 0) {
                $bRet = true;
            }
        }
        return $bRet;
    }
}
?>