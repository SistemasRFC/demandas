<?php
include_once 'Constantes.php';
include_once(PATH."Controller/BaseController.php"); 
include_once(PATH."Model/DescricaoDemandas/DescricaoDemandasModel.php");
class DescricaoDemandasController extends BaseController
{
    /**
     * Redireciona para a Tela de  de DescricaoDemandas
     */
    Public Function ChamaView(){
        $params = array();
        echo ($this->gen_redirect_and_form(BaseController::ReturnView(BaseController::getPath(), get_class($this)), $params));
    }

    Public Function ListarDescricaoDemandas(){
        $DescricaoDemandasModel = new DescricaoDemandasModel();
        echo $DescricaoDemandasModel->ListarDescricaoDemandas();
    }
    
    Public Function InsertDescricaoDemandas(){
        $DescricaoDemandasModel = new DescricaoDemandasModel();
        echo $DescricaoDemandasModel->InsertDescricaoDemandas();
    }
    
    Public Function UpdateDescricaoDemandas(){
        $DescricaoDemandasModel = new DescricaoDemandasModel();
        echo $DescricaoDemandasModel->UpdateDescricaoDemandas();
    }

    Public Function DeleteDescricaoDemandas(){
        $DescricaoDemandasModel = new DescricaoDemandasModel();
        echo $DescricaoDemandasModel->DeleteDescricaoDemandas();
    }	
}
$classController = new DescricaoDemandasController();