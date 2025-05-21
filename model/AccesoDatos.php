<?php
class AccesoDatos{
    private $oConexion = null;
    private $sDBname = "ong_ito";
    private $sHost = "localhost";
    private $sUser = "administrador";
    private $sPassword = "administrador";


    //METODO PARA ACCEDER A LA BD -> conectar()
    function conectar(){
        $bRet = false;
        try{
            $this->oConexion = new PDO(
                "mysql:host=" . $this->sHost . ";dbname=" . $this->sDBname,
                $this->sUser,
                $this->sPassword,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'")
            );
                        $bRet = true;
        }catch(Exception $e){
            throw $e;
        }
        return $bRet;
    }

    //METODO PARA EJECUTAR UNA CONSULTA -> consulta()
    function consulta($psConsulta){
        $arrRS = [];
        $rst = null;
        $oLinea = null;
    
        if ($psConsulta == "") {
            throw new Exception("AccesoDatos->consulta: falta indicar la consulta");
        }
    
        if ($this->oConexion == null) {
            throw new Exception("AccesoDatos->consulta: falta conectar a la base");
        }
    
        try {
            $rst = $this->oConexion->query($psConsulta);
        } catch (Exception $e) {
            throw $e;
        }
    
        if ($rst) {
            $i = 0;
            foreach ($rst as $oLinea) {
                $j = 0;
                foreach ($oLinea as $llave => $sValCol) {
                    if (is_string($llave)) {
                        $arrRS[$i][$j] = $sValCol;
                        $j++;
                    }
                }
                $i++;
            }
        }
    
        return $arrRS;
    }
    

    //METODO PARA EJECUTAR UN COMANDO -> comando()
    function comando($psComando){
        $nAfectados = -1 ;
        if($psComando == ""){
            throw new Exception("AccesoDatos->comando: falta indicar el comando");
        }

        if($this -> oConexion == null){
            throw new Exception("AccesoDatos->comando : falta conectar a la base de datos");
        }

        try{
            $nAfectados = $this -> oConexion -> exec ($psComando);
        }catch(Exception $e){
            throw $e;
        }

        return $nAfectados;
    }

    //METODO PARA DESCONECTAR DE LA BD -> desconectar()
    function desconectar(){
        $bRet = true;
        if($this -> oConexion != null){
            $this -> oConexion = null;
        }

        return $bRet;
    }
}
?>