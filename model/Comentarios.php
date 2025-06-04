<?php
include_once("AccesoDatos.php");

class Comentarios {
    private $nIdComentario = 0;
    private $sComentario = "";
    private $bStatus = 0;
    private $nIdUsuario = 0;
    private $sNombreUsuario = "";

    public function setsNombreUsuario($sNombreUsuario){
        $this->sNombreUsuario = $sNombreUsuario;
    }

    public function getsNombreUsuario(){
        return $this->sNombreUsuario;
    }

    public function setNidComentario($nIdComentario) {
        $this->nIdComentario = $nIdComentario;
    }

    public function getNidComentario() {
        return $this->nIdComentario;
    }

    public function setSComentario($sComentario) {
        $this->sComentario = $sComentario;
    }

    public function getSComentario() {
        return $this->sComentario;
    }

    public function setBStatus($bStatus) {
        $this->bStatus = $bStatus;
    }

    public function getBStatus() {
        return $this->bStatus;
    }

    public function setNidUsuario($nIdUsuario) {
        $this->nIdUsuario = $nIdUsuario;
    }

    public function getNidUsuario() {
        return $this->nIdUsuario;
    }

    // CREATE - Insertar un nuevo comentario
    public function create() {
        $oAccesoDatos = new AccesoDatos();
        $bRet = false;
        
        if (empty($this->sComentario) || $this->nIdUsuario <= 0) {
            throw new Exception("message/Comentarios/Create/sComentario,nIdUsuario");
        }
        
        if ($oAccesoDatos->conectar()) {
            $sQuery = "INSERT INTO Comentarios (sComentario, bStatus, nIdUsuario) 
                      VALUES ('".addslashes($this->sComentario)."', ".intval($this->bStatus).", ".intval($this->nIdUsuario).")";
            
            $arrRS = $oAccesoDatos->comando($sQuery);
            $oAccesoDatos->desconectar();
            
            if ($arrRS > 0) {
                $bRet = true;
            }
        }
        
        return $bRet;
    }

    // UPDATE - Modificar un comentario existente
    public function update() {
        $oAccesoDatos = new AccesoDatos();
        $bRet = false;
        
        if ($this->nIdComentario <= 0 || empty($this->sComentario) || $this->nIdUsuario <= 0) {
            throw new Exception("message/Comentarios/Update/nIdComentario,sComentario,nIdUsuario");
        }
        
        if ($oAccesoDatos->conectar()) {
            $sQuery = "UPDATE Comentarios SET 
                      sComentario = '".addslashes($this->sComentario)."',
                      bStatus = ".intval($this->bStatus).",
                      nIdUsuario = ".intval($this->nIdUsuario)."
                      WHERE nIdComentario = ".intval($this->nIdComentario);
            
            $arrRS = $oAccesoDatos->comando($sQuery);
            $oAccesoDatos->desconectar();
            
            if ($arrRS > 0) {
                $bRet = true;
            }
        }
        
        return $bRet;
    }

    // DELETE - Eliminar un comentario por ID
    public function deleteById($nIdComentario) {
        $oAccesoDatos = new AccesoDatos();
        $bRet = false;
        
        if ($nIdComentario <= 0) {
            throw new Exception("message/Comentarios/Delete/nIdComentario");
        }
        
        if ($oAccesoDatos->conectar()) {
            $sQuery = "DELETE FROM Comentarios WHERE nIdComentario = ".intval($nIdComentario);
            
            $arrRS = $oAccesoDatos->comando($sQuery);
            $oAccesoDatos->desconectar();
            
            if ($arrRS > 0) {
                $bRet = true;
            }
        }
        
        return $bRet;
    }

    // READ - Obtener un comentario por ID
    public static function getById($nIdComentario) {
        $oAccesoDatos = new AccesoDatos();
        $oComentario = null;
        
        if ($nIdComentario <= 0) {
            throw new Exception("message/Comentarios/getById/nIdComentario");
        }
        
        if ($oAccesoDatos->conectar()) {
            $sQuery = "SELECT * FROM Comentarios WHERE nIdComentario = ".intval($nIdComentario);
            
            $arrRS = $oAccesoDatos->consulta($sQuery);
            $oAccesoDatos->desconectar();
            
            if ($arrRS && count($arrRS) > 0) {
                $aLinea = $arrRS[0];
                $oComentario = new Comentarios();
                $oComentario->setNidComentario($aLinea[0]);
                $oComentario->setSComentario($aLinea[1]);
                $oComentario->setBStatus($aLinea[2]);
                $oComentario->setNidUsuario($aLinea[3]);
            }
        }
        
        return $oComentario;
    }

    // READ ALL - Obtener todos los comentarios
    public function getAll() {
        $oAccesoDatos = new AccesoDatos();
        $arrComentarios = array();
        $nCount = 0;
        
        if ($oAccesoDatos->conectar()) {
            $sQuery = "SELECT * FROM Comentarios where bStatus=0";
            
            $arrRS = $oAccesoDatos->consulta($sQuery);
            $oAccesoDatos->desconectar();
            
            if ($arrRS && count($arrRS) > 0) {
                foreach ($arrRS as $aLinea) {
                    $oComentario = new Comentarios();
                    $oComentario->setNidComentario($aLinea[0]);
                    $oComentario->setSComentario($aLinea[1]);
                    $oComentario->setBStatus($aLinea[2]);
                    $oComentario->setNidUsuario($aLinea[3]);
                    
                    $arrComentarios[$nCount] = $oComentario;
                    $nCount++;
                }
            }
        }
        
        return $arrComentarios;
    }


        // READ ALL - Obtener todos los comentarios
        public function getAllUsuarioValidado() {
            $oAccesoDatos = new AccesoDatos();
            $arrComentarios = array();
            $nCount = 0;
            
            if ($oAccesoDatos->conectar()) {
                $sQuery = "SELECT c.sComentario, u.sNombreC  FROM Comentarios c INNER JOIN Usuario u ON c.nIdUsuario=u.nIdUsuario where c.bStatus=1";
                
                $arrRS = $oAccesoDatos->consulta($sQuery);
                $oAccesoDatos->desconectar();
                
                if ($arrRS && count($arrRS) > 0) {
                    foreach ($arrRS as $aLinea) {
                        $oComentario = new Comentarios();
                        $oComentario->setSComentario($aLinea[0]);
                        $oComentario->setsNombreUsuario($aLinea[1]);
                        $arrComentarios[$nCount] = $oComentario;
                        $nCount++;
                    }
                }
            }
            
            return $arrComentarios;
        }

    // Obtener comentarios por usuario
    public static function getByUsuario($nIdUsuario) {
        $oAccesoDatos = new AccesoDatos();
        $arrComentarios = array();
        
        if ($nIdUsuario <= 0) {
            throw new Exception("message/Comentarios/getByUsuario/nIdUsuario");
        }
        
        if ($oAccesoDatos->conectar()) {
            $sQuery = "SELECT * FROM Comentarios WHERE nIdUsuario = ".intval($nIdUsuario);
            
            $arrRS = $oAccesoDatos->consulta($sQuery);
            $oAccesoDatos->desconectar();
            
            if ($arrRS && count($arrRS) > 0) {
                foreach ($arrRS as $aLinea) {
                    $oComentario = new Comentarios();
                    $oComentario->setNidComentario($aLinea[0]);
                    $oComentario->setSComentario($aLinea[1]);
                    $oComentario->setBStatus($aLinea[2]);
                    $oComentario->setNidUsuario($aLinea[3]);
                    
                    $arrComentarios[] = $oComentario;
                }
            }
        }
        
        return $arrComentarios;
    }

    public function updateToTrue(){
        $oAccesoDatos = new AccesoDatos();
        $sQuery = "";
        $nAfectados=-1;   
    
        if ($oAccesoDatos->conectar()) {        
            $sQuery = "UPDATE comentarios 
                       SET bStatus =1                       
                       WHERE nIdComentario = ".intval($this->nIdComentario);
            
            $nAfectados = $oAccesoDatos->comando($sQuery);
            $oAccesoDatos->desconectar();
        }
    
        return $nAfectados;
    }

}
?>