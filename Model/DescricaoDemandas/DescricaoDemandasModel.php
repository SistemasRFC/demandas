<?php
include_once(PATH."Model/BaseModel.php");
include_once(PATH."Dao/DescricaoDemandas/DescricaoDemandasDao.php");
class DescricaoDemandasModel extends BaseModel
{
    public function DescricaoDemandasModel(){
        if (!isset($_SESSION)){
            ob_start();
            session_start();
        }
    }

    Public Function ListarDescricaoDemandas($Json=true){
        $dao = new DescricaoDemandasDao();
        $lista = $dao->ListarDescricaoDemandas();
        if ($lista[0]){
            for($i=0;$i<count($lista[1]);$i++){
                $nmeUsuario = $dao->RetornaUsuarioBanco($lista[1][$i]['COD_USUARIO'], $lista[1][$i]['NME_BANCO']);
                $lista[1][$i]['NME_USUARIO'] = $nmeUsuario[1][0]['NME_USUARIO'];
            }
        }
        if ($Json){
            return json_encode($lista);
        }else{
            return $lista;        
        }
    }
    
    Public Function InsertDescricaoDemandas(){
        $dao = new DescricaoDemandasDao();        
        $result = $dao->InsertDescricaoDemandas($_SESSION['cod_usuario']);
        return json_encode($result);        
    }

    Public Function DeleteDescricaoDemandas(){
        $dao = new DescricaoDemandasDao();
        $result = $dao->DeleteDescricaoDemandas();
        return json_encode($result);
    }
    
}

