<?php
include_once(PATH."Model/BaseModel.php");
include_once(PATH."Dao/ConfiguraCor/ConfiguraCorDao.php");
class ConfiguraCorModel extends BaseModel
{
    public function ConfiguraCorModel(){
        If (!isset($_SESSION)){
            ob_start();
            session_start();
        }
    }

    Public Function ListarConfiguraCor($Json=true){
        $dao = new ConfiguraCorDao();
        $lista = $dao->ListarConfiguraCor();
        if ($Json){
            return json_encode($lista);
        }else{
            return $lista;        
        }
    }
    
    Public Function InsertConfiguraCor(){
        $dao = new ConfiguraCorDao();        
        $result = $dao->InsertConfiguraCor();
        return json_encode($result);        
    }

    Public Function UpdateConfiguraCor(){
        $dao = new ConfiguraCorDao();
        $result = $dao->UpdateConfiguraCor();
        return json_encode($result);
    }	
    
}

