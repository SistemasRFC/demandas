<?php
include_once 'Constantes.php';
include_once(PATH."Controller/BaseController.php"); 
include_once(PATH."Model/ConfiguraCor/ConfiguraCorModel.php");
class ConfiguraCorController extends BaseController
{
    /**
     * Redireciona para a Tela de  de ConfiguraCor
     */
    Public Function ChamaView(){
        $params = array();
        echo ($this->gen_redirect_and_form(BaseController::ReturnView(BaseController::getPath(), get_class($this)), $params));
    }

    Public Function ListarConfiguraCor(){
        $ConfiguraCorModel = new ConfiguraCorModel();
        echo $ConfiguraCorModel->ListarConfiguraCor();
    }
    
    Public Function InsertConfiguraCor(){
        $ConfiguraCorModel = new ConfiguraCorModel();
        echo $ConfiguraCorModel->InsertConfiguraCor();
    }

    Public Function UpdateConfiguraCor(){
        $ConfiguraCorModel = new ConfiguraCorModel();
        echo $ConfiguraCorModel->UpdateConfiguraCor();
    }	
}
$classController = new ConfiguraCorController();