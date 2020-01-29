<?php
include_once 'Constantes.php';
include_once(PATH."Controller/BaseController.php"); 
include_once(PATH."Model/Sistemas/SistemasModel.php");
class SistemasController extends BaseController
{
    /**
     * Redireciona para a Tela de  de Sistemas
     */
    Public Function ChamaView(){
        $params = array();
        echo ($this->gen_redirect_and_form(BaseController::ReturnView(BaseController::getPath(), get_class($this)), $params));
    }

    Public Function ListarSistemas(){
        $SistemasModel = new SistemasModel();
        echo $SistemasModel->ListarSistemas();
    }

    Public Function ListaSistemasAtivos(){
        $SistemasModel = new SistemasModel();
        echo $SistemasModel->ListaSistemasAtivos();
    }
    
    Public Function ListarSistemasAtivosPorUsuario(){
        $SistemasModel = new SistemasModel();
        echo $SistemasModel->ListarSistemasAtivosPorUsuario();
    }

    Public Function InsertSistemas(){
        $SistemasModel = new SistemasModel();
        echo $SistemasModel->InsertSistemas();
    }

    Public Function UpdateSistemas(){
        $SistemasModel = new SistemasModel();
        echo $SistemasModel->UpdateSistemas();
    }	
}
$classController = new SistemasController();