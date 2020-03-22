<?php
include_once 'Constantes.php';
include_once(PATH."Controller/BaseController.php"); 
include_once(PATH."Model/ArquivoDemandas/ArquivoDemandasModel.php");
class ArquivoDemandasController extends BaseController
{
    /**
     * Redireciona para a Tela de  de ArquivoDemandas
     */
    Public Function ChamaView(){
        $params = array();
        echo ($this->gen_redirect_and_form(BaseController::ReturnView(BaseController::getPath(), get_class($this)), $params));
    }

    Public Function ListarArquivoDemandas(){
        $ArquivoDemandasModel = new ArquivoDemandasModel();
        echo $ArquivoDemandasModel->ListarArquivoDemandas();
    }
    
    Public Function InsertArquivoDemandas(){
        $ArquivoDemandasModel = new ArquivoDemandasModel();
        echo $ArquivoDemandasModel->InsertArquivoDemandas();
    }

    Public Function DeleteArquivoDemandas(){
        $ArquivoDemandasModel = new ArquivoDemandasModel();
        echo $ArquivoDemandasModel->DeleteArquivoDemandas();
    }
    
    Public Function uploadArquivo(){    
        $arquivo = $_FILES['arquivo'];
        $tipos = array('sql', 'txt', 'js', 'php', 'doc', 'docx', 'xls', 'pdf', 'jpg', 'png', 'rar', 'zip');
//        var_dump($arquivo);die;
        $enviar = $this->uploadFile($arquivo, '\\var\\www\\html\\demandas\\Resources\\arquivos\\', $tipos);
        $data['sucesso'] = false;
        if(isset($enviar['erro'])){
            $data['msg'] = $enviar['erro'];
        }else{
            $data['sucesso'] = true;
            $data['msg'] = $enviar['caminho'];
        }
        echo json_encode($data);
    }

    function uploadFile($arquivo, $pasta, $tipos, $nome = null){
        $nomeOriginal='';
        if(isset($arquivo)){
            $infos = explode(".", $arquivo["name"]);
            if(!$nome){
                for($i = 0; $i < count($infos) - 1; $i++){
                    $nomeOriginal = $nomeOriginal . $infos[$i] . ".";
                }
            }else{
                $nomeOriginal = $nome . ".";
            }
            $tipoArquivo = $infos[count($infos) - 1];
            $tipoPermitido = false;
            foreach($tipos as $tipo){
                if(strtolower($tipoArquivo) == strtolower($tipo)){
                    $tipoPermitido = true;
                }
            }
            if(!$tipoPermitido){
                $retorno["erro"] = "Tipo nÃ£o permitido";
            }else{
                if(move_uploaded_file($arquivo['tmp_name'], $pasta . $nomeOriginal . $tipoArquivo)){
                    $retorno["caminho"] =  $nomeOriginal . $tipoArquivo;
                }else{
                    $retorno["erro"] = "Erro ao fazer upload";
                }
            }
        }else{
            $retorno["erro"] = "Arquivo nao setado";
        }
        return $retorno;
    }
}
$classController = new ArquivoDemandasController();