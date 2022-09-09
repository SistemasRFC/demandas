<?php
include_once(PATH."Model/BaseModel.php");
include_once(PATH."Dao/Sistemas/SistemasDao.php");
class SistemasModel extends BaseModel
{
    public function __construct(){
        If (!isset($_SESSION)){
            ob_start();
            session_start();
        }
    }

    Public Function ListarSistemas($Json=true){
        $dao = new SistemasDao();
        $lista = $dao->ListarSistemas();
        if ($Json){
            return json_encode($lista);
        }else{
            return $lista;        
        }
    }

    Public Function ListaSistemasAtivos($Json=true){
        $dao = new SistemasDao();
        $lista = $dao->ListaSistemasAtivos();
        if ($Json){
            return json_encode($lista);
        }else{
            return $lista;        
        }
    }
        
    Public Function InsertSistemas(){
        $dao = new SistemasDao();        
        $result = $dao->InsertSistemas();
        return json_encode($result);        
    }

    Public Function UpdateSistemas(){
        $dao = new SistemasDao();
        $result = $dao->UpdateSistemas();
        return json_encode($result);
    }

    Public Function ListarSistemasAtivosPorUsuario($Json=true){
        $dao = new SistemasDao();
        $lista = $dao->ListarSistemasAtivosPorUsuario($_SESSION['cod_usuario']);
        if ($Json){
            return json_encode($lista);
        }else{
            return $lista;        
        }
    }	
    
}

