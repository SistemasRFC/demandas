<?php
include_once(PATH."Model/BaseModel.php");
include_once(PATH."Dao/DescricaoDemandas/DescricaoDemandasDao.php");
class DescricaoDemandasModel extends BaseModel
{
    public function __construct(){
        if (!isset($_SESSION)){
            ob_start();
            session_start();
        }
    }

    Public Function ListarDescricaoDemandas(){
        $dao = new DescricaoDemandasDao();
        $lista = $dao->ListarDescricaoDemandas();
        if ($lista[0]) {
            if ($lista[1]!=null) {
                $total = count($lista[1]);
                for($i=0;$i<$total;$i++) {
                    $nmeUsuario = $dao->RetornaUsuarioBanco($lista[1][$i]['COD_USUARIO'], $lista[1][$i]['NME_BANCO']);
                    $lista[1][$i]['NME_USUARIO'] = $nmeUsuario[1][0]['NME_USUARIO'];
                }
            }
        }
        return json_encode($lista);
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

