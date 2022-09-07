<?php
include_once 'Constantes.php';
include_once(PATH."Controller/BaseController.php"); 
include_once(PATH."Model/Demandas/DemandasModel.php");
class DemandasController extends BaseController
{
    /**
     * Redireciona para a Tela de  de Demandas
     */
    Public Function ChamaView(){
        $params = array();
        echo ($this->gen_redirect_and_form(BaseController::ReturnView(BaseController::getPath(), get_class($this)), $params));
    }

    Public Function ChamaViewSituacao(){
        $codSituacao = isset($_GET['codSituacao'])?$_GET['codSituacao']:'';
        $params = array('codSituacao' => $codSituacao);
        echo ($this->gen_redirect_and_form(BaseController::ReturnView(BaseController::getPath(), get_class($this)), $params));
    }
    
    Public Function ListarDemandas(){
        $DemandasModel = new DemandaModel();
        echo $DemandasModel->ListarDemandas();
    }
    
    Public Function InsertDemandas(){
        $DemandasModel = new DemandaModel();
        echo $DemandasModel->InsertDemandas();
    }

    Public Function UpdateDemandas(){
        $DemandasModel = new DemandaModel();
        echo $DemandasModel->UpdateDemandas();
    }

    Public Function ListarLogsDemanda(){
        $DemandasModel = new DemandaModel();
        echo $DemandasModel->ListarLogsDemanda();
    }

    Public Function ListarDemandasPendentes(){
        $DemandasModel = new DemandaModel();
        echo $DemandasModel->ListarDemandasPendentes();
    }

    Public Function ListarDemandasAguardando(){
        $DemandasModel = new DemandaModel();
        echo $DemandasModel->ListarDemandasAguardando();
    }

    Public Function ListarDemandasUsuario(){
        $DemandasModel = new DemandaModel();
        echo $DemandasModel->ListarDemandasUsuario();
    }

    Public Function ContagemDemandasStatus(){
        $DemandasModel = new DemandaModel();
        echo $DemandasModel->ContagemDemandasStatus();
    }

    Public Function ContagemDemandasPrioridade(){
        $DemandasModel = new DemandaModel();
        echo $DemandasModel->ContagemDemandasPrioridade();
    }

    Public Function ContagemDemandasTotal(){
        $DemandasModel = new DemandaModel();
        echo $DemandasModel->ContagemDemandasTotal();
    }
}
$classController = new DemandasController();