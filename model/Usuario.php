<?php

include_once("AccesoDatos.php");

class Usuario{
    private $nIdUsuario = 0;
    private $sNombreC = "";
    private $sEmail = "";
    private $sPassword = "";
    private $sRol = "";
    private $sRfc="";
    private $sDomicilio="";


    public function setnIdUsuario($nIdUsuario){
        $this -> nIdUsuario = $nIdUsuario;
    }

    public function setsNombreC($sNombreC){
        $this -> sNombreC = $sNombreC;
    }

    public function setsEmail($sEmail){
        $this -> sEmail = $sEmail;
    }

    public function setsPassword($sPassword){
        $this -> sPassword = $sPassword;
    }

    public function getsPassword(){
        return $this -> sPassword;
    }

    public function setsRol($sRol){
        $this -> sRol = $sRol;
    }

    public function setsRfc($sRfc){
        $this->sRfc=$sRfc;
    }

    public function setsDomicilio($sDomicilio){
        $this -> sDomicilio=$sDomicilio;
    }

    public function getsDomiclio(){
        return $this->sDomicilio;
    }

    public function getsRfc(){
        return $this->sRfc;
    }

    public function getnIdUsuario(){
        return $this -> nIdUsuario;
    }

    public function getsNombreC(){
        return $this -> sNombreC;
    }

    public function getsEmail(){
        return $this -> sEmail;
    }

    public function getsRol(){
        return $this -> sRol;
    }


    // B -LOGIN : Carlos Iván Flores Sánchez -> CAMBIE DE sNombreC a sEmail
    public function login(){
        $oAccesoDatos = new AccesoDatos();
        $sQuery = "";
        $bRet = false;
        $arrRS = null;

        if($this->sEmail=="" || $this->sPassword==""){throw new Exception("/m/Benefactor/login/sEmail&&sPassword");}else{
            if($oAccesoDatos->conectar()){
                $sQuery = "SELECT nIdUsuario, sNombreC, sEmail, sRol FROM Usuario WHERE sEmail = '$this->sEmail' AND sPassword = '$this->sPassword'";
                $arrRS = $oAccesoDatos -> consulta($sQuery);
                $oAccesoDatos -> desconectar();
                if($arrRS != null){
                    $this -> nIdUsuario = $arrRS[0][0];
                    $this -> sNombreC = $arrRS[0][1];
                    $this -> sEmail = $arrRS[0][2];
                    $this -> sRol = $arrRS[0][3];
                    $bRet = true;
                }
            }
        }
        return $bRet;
    }

    //B-REGISTER: Saul Lima Gonzalez
    public function exists($sEmail){
        $oAccesoDatos=new AccesoDatos();
        $sQuery="";
        $bandera=false;
        $arrRS=null;
        if($oAccesoDatos->conectar()){
            $sQuery="SELECT nIdUsuario,sNombreC,sPassword FROM Usuario WHERE sEmail='".$sEmail."'";
            $arrRS=$oAccesoDatos->consulta($sQuery);
            $oAccesoDatos->desconectar();
            if($arrRS && is_array($arrRS)){
                $bandera=true;
            }
        }
        return $bandera;
    }
    //B-REGISTER:Saul Lima Gonzalez  -> Se modifico para que tambien reciba el rfc y el domicilio de tipo VARCHAR 
    public function register(){
        $oAccesoDatos=new AccesoDatos();
        $sQuery="";
        $nAfectados=-1;
        if($this->sNombreC=="" || $this->sPassword=="" || $this->sEmail=="" || $this->sRol==""){
            throw new Exception("message/Usuario/datos vacios");
        }else{
         /*if($this->exists($this->sEmail)){
            throw new Exception("message/Usuario/usuario ya existente");
            echo "este correo ya esta dado de alta";
        }*/if($oAccesoDatos->conectar()){
            $sQuery="INSERT INTO Usuario (sNombreC,sPassword,sEmail,sRol,sRfc,sDomicilio)
            VALUES ('".$this->sNombreC."', '".$this->sPassword."', '"
            .$this->sEmail."', '".$this->sRol."', '".$this->sRfc."', '".$this->sDomicilio."')";
            $nAfectados=$oAccesoDatos->comando($sQuery);
            $oAccesoDatos->desconectar();
        }        
    }
    return $nAfectados;
    }


       //B- USUARUOS -> READ ALL : Flores Sánchez Carlos Iván
       public function getAll() {
        $oAccesoDatos = new AccesoDatos();
        $sQuery = "";
        $arrRS = null;
        $oUsuario = null;
        $arrUsuarios = [];
        $nCount = 0;
        try {
            if ($oAccesoDatos->conectar()) {
                $sQuery = "SELECT * FROM Usuario";
                $arrRS = $oAccesoDatos->consulta($sQuery);
                $oAccesoDatos->desconectar();
                
                if ($arrRS) {
                    foreach ($arrRS as $fila) {
                        $oUsuario = new Usuario();
                        $oUsuario->setnIdUsuario($fila[0]);
                        $oUsuario->setsNombreC($fila[1]);
                        $oUsuario->setsPassword($fila[2]);
                        $oUsuario->setsEmail($fila[3]);                        
                        $oUsuario->setsRol($fila[4]);
                        
                        $arrUsuarios[$nCount] = $oUsuario;
                        $nCount++;
                    }
                }
            }
        } catch (Exception $e) {
            throw $e;
        }
        return $arrUsuarios;
    }


          //B- USUARUOS -> READ ALL : Flores Sánchez Carlos Iván
          public function getActivos() {
            $oAccesoDatos = new AccesoDatos();
            $sQuery = "";
            $arrRS = null;
            $oUsuario = null;
            $arrUsuarios = [];
            $nCount = 0;
            try {
                if ($oAccesoDatos->conectar()) {
                    $sQuery = "SELECT * FROM Usuario WHERE sRol = 'donador'";
                    $arrRS = $oAccesoDatos->consulta($sQuery);
                    $oAccesoDatos->desconectar();
                    
                    if ($arrRS) {
                        foreach ($arrRS as $fila) {
                            $oUsuario = new Usuario();
                            $oUsuario->setnIdUsuario($fila[0]);
                            $oUsuario->setsNombreC($fila[1]);
                            $oUsuario->setsEmail($fila[2]);
                            $oUsuario->setsPassword($fila[3]);
                            $oUsuario->setsRol($fila[4]);
                            
                            $arrUsuarios[$nCount] = $oUsuario;
                            $nCount++;
                        }
                    }
                }
            } catch (Exception $e) {
                throw $e;
            }
            return $arrUsuarios;
        }

        //B-USUARIOS->readById -Saul Lima Gonzalez 
        public function readById($id){
        $oAccesoDatos = new AccesoDatos();
        $sQuery = "";
        $arrRS = null;
        $oUsuario = null;
        if($id==0){throw new Exception("/m/Usuario/byId/id");}
        else{
            if($oAccesoDatos -> conectar()){
                $sQuery = "SELECT nIdUsuario,sNombreC,sPassword,sEmail,sRol,sRfc,sDomicilio FROM usuario WHERE nIdUsuario=".intval($id);
                $arrRS = $oAccesoDatos -> consulta($sQuery);
                $oAccesoDatos -> desconectar();
                if($arrRS && count($arrRS)>0){
                        $fila = $arrRS[0];
                        $oUsuario = new Usuario();
                        $oUsuario->nIdUsuario=$fila[0];
                        $oUsuario->sNombreC=$fila[1];
                       $oUsuario->sPassword=$fila[2];
                        $oUsuario->sEmail=$fila[3];
                        $oUsuario->sRol=$fila[4];
                        $oUsuario->sRfc=$fila[5];
                        $oUsuario->sDomicilio=$fila[6];
                        
                };
            }
        }
        return $oUsuario;
    }

        //B-> USUARIO -> update :Saul Lima Gonzalez
    public function update(){
        $oAccesoDatos=new AccesoDatos();
        $sQuery="";
        $nAfectados=-1;
        if ($this->nIdUsuario<0 || $this->nIdUsuario==0 || empty($this->sNombreC) || empty($this->sEmail) || empty($this->sRfc)
        || empty($this->sRol) || empty($this->sDomicilio) || empty($this->sPassword)){
            throw new Exception("message/Usuario/Update/campos nulos,vacios o invalidos");
        }else{
            if($oAccesoDatos->conectar()){
               $sQuery = "UPDATE usuario SET                 
                sNombreC = '" . $this->sNombreC . "',
                sEmail='".$this->sEmail."',
                sRol='".$this->sRol."',
                sDomicilio='".$this->sDomicilio."',
                sRfc='".$this->sRfc."',
                sPassword = '" . $this->sPassword . "'               
                 WHERE nIdUsuario= " . intval($this->nIdUsuario);
                $nAfectados=$oAccesoDatos->comando($sQuery);
                $oAccesoDatos->desconectar();
            }
        }
        return $nAfectados;
    }

        //B-> deleteById : Saul Lima Gonzalez
    public function deleteById($id){
        $oAccesoDatos=new AccesoDatos();
        $sQuery="";
        $arrRS=0;
        $bRet=false;
        if($id<=0 || $id==null){
            throw new Exception("message/Usuario/deleteById/id nulo o menor que 0");
        }else{
            if($oAccesoDatos->conectar()){
            $sQuery="DELETE FROM usuario WHERE nIdUsuario=".intval($id);
            $arrRS=$oAccesoDatos->comando($sQuery);
            $oAccesoDatos->desconectar();
            if($arrRS>0){
                $bRet=true;
            }
        }
        }
        return $bRet;

    }

    //B-> READ NAME BY EMAIL : Saul Lima Gonzalez 
    public function readNameByEmail($email){
        $oAccesoDatos=new AccesoDatos();
        $sQuery="";
        $arrRS=null;
        $oUsuario=null;
        if(empty($email)){
            throw new Exception ("message/Usuario->el email no es valido o esta vacio");
        }else{
            if($oAccesoDatos->conectar()){
                $sQuery="SELECT sNombreC FROM Usuario WHERE sEmail='".$email."'";
                $arrRS=$oAccesoDatos->consulta($sQuery);
                $oAccesoDatos->desconectar();
                if($arrRS && count($arrRS)>0){
                    $oUsuario=new Usuario();
                    $fila=$arrRS[0];
                    $oUsuario->sNombreC=$fila[0];
                };
            }
        }
        return $oUsuario;
    }

}
?>