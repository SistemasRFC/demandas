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
        $DemandasModel = new DemandasModel();
        echo $DemandasModel->ListarDemandas();
    }
    
    Public Function InsertDemandas(){
        $DemandasModel = new DemandasModel();
        echo $DemandasModel->InsertDemandas();
    }

    Public Function UpdateDemandas(){
        $DemandasModel = new DemandasModel();
        echo $DemandasModel->UpdateDemandas();
    }

    Public Function ListarLogsDemanda(){
        $DemandasModel = new DemandasModel();
        echo $DemandasModel->ListarLogsDemanda();
    }

    Public Function ListarDemandasPendentes(){
        $DemandasModel = new DemandasModel();
        echo $DemandasModel->ListarDemandasPendentes();
    }

    Public Function ListarDemandasAguardando(){
        $DemandasModel = new DemandasModel();
        echo $DemandasModel->ListarDemandasAguardando();
    }

    Public Function ListarDemandasUsuario(){
        $DemandasModel = new DemandasModel();
        echo $DemandasModel->ListarDemandasUsuario();
    }

    Public Function ContagemDemandasStatus(){
        $DemandasModel = new DemandasModel();
        echo $DemandasModel->ContagemDemandasStatus();
    }

    Public Function ContagemDemandasPrioridade(){
        $DemandasModel = new DemandasModel();
        echo $DemandasModel->ContagemDemandasPrioridade();
    }

    Public Function ContagemDemandasTotal(){
        $DemandasModel = new DemandasModel();
        echo $DemandasModel->ContagemDemandasTotal();
    }
}
$classController = new DemandasController();