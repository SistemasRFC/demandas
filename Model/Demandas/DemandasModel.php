<?php
include_once(PATH."Model/BaseModel.php");
include_once(PATH."Dao/Demandas/DemandasDao.php");
class DemandasModel extends BaseModel
{
    public static $dscDemandas = array(1=>'AGUARDANDO ATENDIMENTO',
                                2=>'EM DESENVOLVIMENTO',
                                3=>'PAUSADA',
                                4=>'CONCLUÍDA',
                                5=>'ENVIADA PARA HOMOLOGAÇÃO',
                                6=>'FINALIZADA',
                                7=>'CANCELADA');
    public function DemandasModel(){
        If (!isset($_SESSION)){
            ob_start();
            session_start();
        }
    }

    Public Function ListarDemandas($Json=true){
        $dao = new DemandasDao();
        $lista = $dao->ListarDemandas($_SESSION['cod_usuario']);
        if ($Json){
            return json_encode($lista);
        }else{
            return $lista;        
        }
    }
    
    Public Function InsertDemandas(){
        $dao = new DemandasDao();
        $dao->IniciaTransacao();
        $result = $dao->InsertDemandas($_SESSION['cod_usuario']);
        if($result[0] && $result[1]!=null){
            $codDemanda = $result[2];
            $result = $dao->RegistraSituacaoOperacao($codDemanda, $dao->Populate('codSituacao', 'I'), 'I', $_SESSION['cod_usuario'], $dao->Populate('codSistemaOrigem', 'I'));
            if ($result[0]){
                $mensagem = "Favor não responder esta mensagem!";
                $mensagem .= "<br><br><br>";
                $mensagem .= "A Demanda Nº: ".$codDemanda." foi criada!";
                $titulo = "Criação de Demanda";
//                $result = $this->EnviarDemandaPorEmail($dao, $codDemanda, $titulo, $mensagem);
            }
        }
        if($result[0]){
            $result[2] = $codDemanda;
             $dao->ComitaTransacao();
        }else{
            $dao->RolbackTransacao();
        }
        return json_encode($result);        
    }
    
    Public Function UpdateDemandas(){
        $dao = new DemandasDao();
        $dao->IniciaTransacao();
        $result[0] = false;
        $result[1] = "Essa demanda não pode ser alterada!";
        if ($dao->Populate('codSituacaoAnterior', 'I')!=FINALIZADA && $dao->Populate('codSituacaoAnterior', 'I')!=CANCELADA){
            switch ($dao->Populate('codSituacao', 'I')){
                case FINALIZADA:
                    $result = $dao->FinalizaDemanda();
                    break;
                case CANCELADA:
                    $result = $dao->FinalizaDemanda();
                    break;                    
                default:
                    $result = $dao->UpdateDemandas();
                    break;
            }
        }

        if($result[0] && $result[1]!=null){
            if ($dao->Populate('codSituacao', 'I')!=$dao->Populate('codSituacaoAnterior', 'I')){
                $result = $dao->RegistraSituacaoOperacao($dao->Populate('codDemanda', 'I'), $dao->Populate('codSituacao', 'I'), 'U', $_SESSION['cod_usuario'], $dao->Populate('codSistemaOrigem', 'I'));
            }
            
            if ($result[0]){
                $mensagem = "Favor não responder esta mensagem!";
                $mensagem .= "<br><br><br>";
                $mensagem .= "A Demanda Nº: ".$dao->Populate('codDemanda', 'I')." foi alterada para a situação: ".self::$dscDemandas[$dao->Populate('codSituacao', 'I')]."!";
                $titulo = "Alteração de Demanda";
//                $result = $this->EnviarDemandaPorEmail($dao, $dao->Populate('codDemanda', 'I'), $titulo, $mensagem);
            }            
        }
        if($result[0]){
            $dao->ComitaTransacao();
        }else{
            $dao->RolbackTransacao();
        }
        return json_encode($result);
    }

    Public Function EnviarDemandaPorEmail(DemandasDao $dao, $codDemanda, $titulo, $mensagem){
        $result = $dao->RetornaUsuariosDemanda($codDemanda);
        $nmeBanco = $result[1][0]['NME_BANCO'];
        $codUsuario = $result[1][0]['COD_CRIADOR'];
        if ($result[0]){
            if($result[1][0]['NME_USUARIO_COMPLETO'] !== NULL){
                $nmeDestinatario = $result[1][0]['NME_USUARIO_COMPLETO'];
                $emailDestinatario = $result[1][0]['TXT_EMAIL'];
                $this->EnviaEmail($nmeDestinatario, $emailDestinatario, $titulo, $mensagem);
            }else{
                $result = $dao->RetornaDesenvolvedores();
                if($result[0]){
                    for($i=0;$i<count($result[1]);$i++){
                        $nmeDestinatario = $result[1][$i]['NME_USUARIO_COMPLETO'];
                        $emailDestinatario = $result[1][$i]['TXT_EMAIL'];
//                        $this->EnviaEmail($nmeDestinatario, $emailDestinatario, $titulo, $mensagem);
                    }
                }
            }
            $result = $dao->RetornaCriadorDemanda($nmeBanco, $codUsuario);
            if($result[0]){
                $nmeDestinatario = $result[1][0]['NME_CRIADOR'];
                $emailDestinatario = $result[1][0]['TXT_EMAIL_CRIADOR'];
                if ($emailDestinatario != ''){
//                    $this->EnviaEmail($nmeDestinatario, $emailDestinatario, $titulo, $mensagem);
                }
            }
        }
        return $result;
    }	
    
    Public Function ListarLogsDemanda($Json=true){
        $dao = new DemandasDao();
        $lista = $dao->ListarLogsDemanda();
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

    Public Function ListarDemandasPendentes($Json=true){
        $dao = new DemandasDao();
        $lista = $dao->ListarDemandasPendentes($_SESSION['cod_usuario']);
        if ($Json){
            return json_encode($lista);
        }else{
            return $lista;        
        }
    }

    Public Function ListarDemandasUsuario($Json=true){
        $dao = new DemandasDao();
        $lista = $dao->ListarDemandasUsuario($_SESSION['cod_usuario']);
        if ($Json){
            return json_encode($lista);
        }else{
            return $lista;        
        }
    }

    Public Function ContagemDemandasStatus($Json=true){
        $dao = new DemandasDao();
        $lista = $dao->ContagemDemandasStatus($_SESSION['cod_usuario']);
        if ($Json){
            return json_encode($lista);
        }else{
            return $lista;        
        }
    }

    Public Function ContagemDemandasPrioridade($Json=true){
        $dao = new DemandasDao();
        $lista = $dao->ContagemDemandasPrioridade($_SESSION['cod_usuario']);
        if ($Json){
            return json_encode($lista);
        }else{
            return $lista;        
        }
    }

    Public Function ContagemDemandasTotal($Json=true){
        $dao = new DemandasDao();
        $lista = $dao->ContagemDemandasTotal($_SESSION['cod_usuario']);
        if ($Json){
            return json_encode($lista);
        }else{
            return $lista;        
        }
    }
}

