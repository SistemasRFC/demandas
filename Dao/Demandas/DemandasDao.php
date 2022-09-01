<?php
include_once(PATH."Dao/BaseDao.php");
class DemandasDao extends BaseDao
{
    Protected $tableName = "EN_DEMANDAS";
    
    Protected $columns = array ("tpoDemanda"   => array("column" =>"TPO_DEMANDA", "typeColumn" =>"I"),
                                "dscDemanda"   => array("column" =>"DSC_DEMANDA", "typeColumn" =>"S"),
                                "codSistema"   => array("column" =>"COD_SISTEMA", "typeColumn" =>"I"),
                                "dtaDemanda"   => array("column" =>"DTA_DEMANDA", "typeColumn" =>"D"),
                                "codResponsaveis"   => array("column" =>"COD_RESPONSAVEIS", "typeColumn" =>"S"),
                                "codSituacao"   => array("column" =>"COD_SITUACAO", "typeColumn" =>"I"),
                                "indPrioridade"   => array("column" =>"IND_PRIORIDADE", "typeColumn" =>"I"),
                                "dtaFimDemanda"   => array("column" =>"DTA_FIM_DEMANDA", "typeColumn" =>"D"),
                                "codUsuario"   => array("column" =>"COD_USUARIO", "typeColumn" =>"I"),
                                "codSistemaOrigem"   => array("column" =>"COD_SISTEMA_ORIGEM", "typeColumn" =>"I"));
    
    Protected $columnKey = array("codDemanda"=> array("column" =>"COD_DEMANDA", "typeColumn" => "I"));
    
    Public Function DemandasDao(){
        $this->conect();
    }

    Public Function ListarDemandas($codUsuario){
        $sql= "SELECT D.COD_DEMANDA,
                      COALESCE(TIMESTAMPDIFF(DAY,D.DTA_DEMANDA, COALESCE(D.DTA_FIM_DEMANDA, NOW())), 0) AS DIAS_DECORRIDAS,
                      CASE WHEN TIMEDIFF(TIME(COALESCE(D.DTA_FIM_DEMANDA, NOW())), TIME(D.DTA_DEMANDA))<0 THEN ADDTIME(TIMEDIFF(TIME(COALESCE(D.DTA_FIM_DEMANDA, NOW())), TIME(D.DTA_DEMANDA)), '24:00:00')
                      ELSE TIMEDIFF(TIME(COALESCE(D.DTA_FIM_DEMANDA, NOW())), TIME(D.DTA_DEMANDA)) END AS HORAS_DECORRIDAS,
                      D.DSC_DEMANDA,
                      D.COD_SISTEMA,
                      D.COD_SISTEMA_ORIGEM,
                      S.NME_SISTEMA,
                      D.DTA_DEMANDA AS DATA_DEMANDA,
                      DATE_FORMAT(D.DTA_DEMANDA,'%d/%m/%Y %T') AS DTA_DEMANDA, 
                      D.COD_RESPONSAVEIS,
                      D.COD_USUARIO,
                      COALESCE(U.NME_USUARIO_COMPLETO, 'Sem Responsável') AS NME_USUARIO_COMPLETO,
                      D.COD_SITUACAO,
                      SI.DSC_SITUACAO,
                      CASE WHEN IND_PRIORIDADE = '0' THEN ''
                           WHEN IND_PRIORIDADE = '1' THEN 'Baixa'
                           WHEN IND_PRIORIDADE = '2' THEN 'Normal'
                           WHEN IND_PRIORIDADE = '3' THEN 'Alta'
                           WHEN IND_PRIORIDADE = '4' THEN 'Crítica'
                      END AS DSC_PRIORIDADE,
                      D.IND_PRIORIDADE,
                      CASE WHEN TPO_DEMANDA = '0' THEN ''
                           WHEN TPO_DEMANDA = '1' THEN 'Incidente'
                           WHEN TPO_DEMANDA = '2' THEN 'Corretiva'
                           WHEN TPO_DEMANDA = '3' THEN 'Evolutiva'
                      END AS DSC_TIPO,
                      D.TPO_DEMANDA,
                      CC.DSC_COR
                 FROM EN_DEMANDAS D
                INNER JOIN EN_SISTEMAS S
                   ON D.COD_SISTEMA = S.COD_SISTEMA
                INNER JOIN EN_SITUACAO SI
                   ON D.COD_SITUACAO = SI.COD_SITUACAO
                 LEFT JOIN SE_USUARIO U
                   ON D.COD_RESPONSAVEIS = U.COD_USUARIO
                 LEFT JOIN EN_CONFIGURA_COR CC
                   ON (COALESCE(TIMESTAMPDIFF(HOUR,D.DTA_DEMANDA, COALESCE(D.DTA_FIM_DEMANDA, NOW())), 0)+
                       COALESCE(TIMESTAMPDIFF(MINUTE,D.DTA_DEMANDA, COALESCE(D.DTA_FIM_DEMANDA, NOW())), 0)+
                       COALESCE(TIMESTAMPDIFF(SECOND,D.DTA_DEMANDA, COALESCE(D.DTA_FIM_DEMANDA, NOW())), 0)) BETWEEN CC.VLR_TEMPO_INICIAL AND CC.VLR_TEMPO_FINAL
                WHERE 1=1";
        if($this->Populate('comboTpoDemanda', 'I') !== '0'){
            $sql .=" AND D.COD_SITUACAO = ".$this->Populate('comboTpoDemanda', 'I');
        }
        // if($codUsuario !== '1'){
        //     $sql .=" AND (COD_RESPONSAVEIS = $codUsuario
        //               OR D.COD_USUARIO = $codUsuario)";
        // }
            $sql .=" GROUP BY COD_DEMANDA
                     ORDER BY DATA_DEMANDA DESC";
        //    echo $sql; die;
        return $this->selectDB($sql, false);
    }
    
    Public Function UpdateDemandas(){
        $sql = "UPDATE EN_DEMANDAS SET DSC_DEMANDA = '".$this->Populate('dscDemanda','S')."',
                                       COD_SISTEMA = ".$this->Populate('codSistema','I').",
                                       COD_SISTEMA_ORIGEM = '".$this->Populate('codSistemaOrigem','I')."',
                                       COD_RESPONSAVEIS = '".$this->Populate('codResponsaveis','S')."',
                                       COD_SITUACAO = '".$this->Populate('codSituacao','I')."',
                                       IND_PRIORIDADE = '".$this->Populate('indPrioridade','I')."',
                                       TPO_DEMANDA = '".$this->Populate('tpoDemanda','I')."'
                 WHERE COD_DEMANDA = '".$this->Populate('codDemanda','I')."'";
        return $this->insertDB($sql);
    }

    Public Function FinalizaDemanda(){
        $sql = "UPDATE EN_DEMANDAS SET DSC_DEMANDA = '".$this->Populate('dscDemanda','S')."',
                                       COD_SISTEMA = ".$this->Populate('codSistema','I').",
                                       COD_SISTEMA_ORIGEM = '".$this->Populate('codSistemaOrigem','I')."',
                                       COD_RESPONSAVEIS = '".$this->Populate('codResponsaveis','S')."',
                                       COD_SITUACAO = '".$this->Populate('codSituacao','I')."',
                                       IND_PRIORIDADE = '".$this->Populate('indPrioridade','I')."',
                                       TPO_DEMANDA = '".$this->Populate('tpoDemanda','I')."',
                                       DTA_FIM_DEMANDA = NOW()
                 WHERE COD_DEMANDA = '".$this->Populate('codDemanda','I')."'";
        return $this->insertDB($sql);
    }

    Public Function InsertDemandas($codUsuario){
        $sql = "INSERT INTO EN_DEMANDAS
                (   DSC_DEMANDA, 
                    COD_SISTEMA, 
                    COD_SISTEMA_ORIGEM, 
                    DTA_DEMANDA, 
                    COD_RESPONSAVEIS, 
                    COD_SITUACAO,
                    IND_PRIORIDADE,
                    TPO_DEMANDA,
                    COD_USUARIO)
                VALUES
                (   '".$this->Populate('dscDemanda','S')."',
                    ".$this->Populate('codSistema','I').",
                    ".$this->Populate('codSistemaOrigem','I').",
                    NOW(), 
                    '".$this->Populate('codResponsaveis','S')."',
                    '".$this->Populate('codSituacao','I')."',
                    '".$this->Populate('indPrioridade','I')."',
                    '".$this->Populate('tpoDemanda','I')."',
                    $codUsuario)";
        $codDemanda = "SELECT MAX(COD_DEMANDA) FROM EN_DEMANDAS";
        $return[2] = $this->selectDB($codDemanda, false);
        $return = $this->insertDB($sql);
        return $return;
    }
    
    Public Function RegistraSituacaoOperacao($codDemanda, $codSituacao, $tpoOperacao, $codUsuario, $codSistemaOrigem){
        $sql = " INSERT INTO EN_LOG_SITUACAO_DEMANDA
                (   COD_DEMANDA,
                    COD_SITUACAO,
                    TPO_OPERACAO,
                    DTA_OPERACAO,
                    COD_USUARIO,
                    COD_SISTEMA_ORIGEM)
                VALUES
                (   ".$codDemanda.",
                    ".$codSituacao.",
                    '".$tpoOperacao."',
                    NOW(),
                    ".$codUsuario.",
                    ".$codSistemaOrigem.")";
        return $this->insertDB($sql);
    }
    
    Public Function ListarLogsDemanda(){
        $sql = " SELECT DATE_FORMAT(LSD.DTA_OPERACAO,'%d/%m/%Y %T') AS DTA_OPERACAO,
                        CASE WHEN LSD.TPO_OPERACAO = 'I' THEN 'Inserção'
                             WHEN LSD.TPO_OPERACAO = 'U' THEN 'Alteração'
                        END AS TPO_OPERACAO,
                        S.DSC_SITUACAO,
                        LSD.COD_SISTEMA_ORIGEM,
                        LSD.COD_USUARIO,
                        SIS.NME_BANCO
                   FROM EN_LOG_SITUACAO_DEMANDA LSD
                  INNER JOIN EN_SITUACAO S
                     ON LSD.COD_SITUACAO = S.COD_SITUACAO
                  INNER JOIN EN_SISTEMAS SIS
                     ON LSD.COD_SISTEMA_ORIGEM = SIS.COD_SISTEMA
                  WHERE LSD.COD_DEMANDA = ".$this->Populate('codDemanda', 'I')."
                  ORDER BY LSD.DTA_OPERACAO";
        return $this->selectDB($sql, false);
    }
    
    Public Function ListarDemandasPendentes($codUsuario){
        $sql= "SELECT D.COD_DEMANDA,
                      D.DSC_DEMANDA,
                      S.NME_SISTEMA,
                      CASE WHEN IND_PRIORIDADE = '0' THEN ''
                           WHEN IND_PRIORIDADE = '1' THEN 'Baixa'
                           WHEN IND_PRIORIDADE = '2' THEN 'Normal'
                           WHEN IND_PRIORIDADE = '3' THEN 'Alta'
                           WHEN IND_PRIORIDADE = '4' THEN 'Crítica'
                      END AS DSC_PRIORIDADE
                 FROM EN_DEMANDAS D
                INNER JOIN EN_SISTEMAS S
                   ON D.COD_SISTEMA = S.COD_SISTEMA
                WHERE D.COD_SITUACAO = 1";
        if($codUsuario !== '1'){
            $sql .=" AND D.COD_RESPONSAVEIS = $codUsuario";
        }
            $sql .=" GROUP BY COD_DEMANDA
                ORDER BY IND_PRIORIDADE DESC, COD_DEMANDA";
//            echo $sql; die;
        return $this->selectDB($sql, false);
    }
    
    Public Function ListarDemandasAguardando(){
        $sql= "SELECT D.COD_DEMANDA,
                      D.DSC_DEMANDA,
                      D.COD_SISTEMA,
                      D.COD_SISTEMA_ORIGEM,
                      S.NME_SISTEMA,
                      D.DTA_DEMANDA AS DATA_DEMANDA,
                      DATE_FORMAT(D.DTA_DEMANDA,'%d/%m/%Y %T') AS DTA_DEMANDA,
                      COALESCE(U.NME_USUARIO_COMPLETO, 'Sem Responsável') AS NME_USUARIO_COMPLETO,
                      CASE WHEN IND_PRIORIDADE = '0' THEN ''
                           WHEN IND_PRIORIDADE = '1' THEN 'Baixa'
                           WHEN IND_PRIORIDADE = '2' THEN 'Normal'
                           WHEN IND_PRIORIDADE = '3' THEN 'Alta'
                           WHEN IND_PRIORIDADE = '4' THEN 'Crítica'
                      END AS DSC_PRIORIDADE,
                      D.IND_PRIORIDADE,
                      CASE WHEN TPO_DEMANDA = '0' THEN ''
                           WHEN TPO_DEMANDA = '1' THEN 'Incidente'
                           WHEN TPO_DEMANDA = '2' THEN 'Corretiva'
                           WHEN TPO_DEMANDA = '3' THEN 'Evolutiva'
                      END AS DSC_TIPO,
                      D.TPO_DEMANDA
                 FROM EN_DEMANDAS D
                INNER JOIN EN_SISTEMAS S
                   ON D.COD_SISTEMA = S.COD_SISTEMA
                INNER JOIN EN_SITUACAO SI
                   ON D.COD_SITUACAO = SI.COD_SITUACAO
                 LEFT JOIN SE_USUARIO U
                   ON D.COD_RESPONSAVEIS = U.COD_USUARIO
                WHERE D.COD_SITUACAO = 1
                AND D.COD_RESPONSAVEIS IS NULL
                GROUP BY COD_DEMANDA
                ORDER BY DATA_DEMANDA";
//            echo $sql; die;
        return $this->selectDB($sql, false);
    }
    
    Public Function ListarDemandasUsuario($codUsuario){
        $sql= "SELECT D.COD_DEMANDA,
                      D.DSC_DEMANDA,
                      D.DTA_DEMANDA AS DATA_DEMANDA,
                      DATE_FORMAT(D.DTA_DEMANDA,'%d/%m/%Y %T') AS DTA_DEMANDA, 
                      D.COD_RESPONSAVEIS,
                      D.COD_SISTEMA,
                      S.NME_SISTEMA,
                      D.COD_SISTEMA_ORIGEM,
                      U.NME_USUARIO_COMPLETO,
                      D.COD_SITUACAO,
                      SI.DSC_SITUACAO,
                      D.IND_PRIORIDADE,
                      D.TPO_DEMANDA
                 FROM EN_DEMANDAS D
                INNER JOIN EN_SISTEMAS S
                   ON D.COD_SISTEMA = S.COD_SISTEMA
                INNER JOIN EN_SITUACAO SI
                   ON D.COD_SITUACAO = SI.COD_SITUACAO
                 LEFT JOIN SE_USUARIO U
                   ON D.COD_RESPONSAVEIS = U.COD_USUARIO
                WHERE D.COD_SITUACAO NOT IN (6,7)";
        if($codUsuario !== '1'){
            $sql .=" AND D.COD_USUARIO = $codUsuario";
        }
            $sql .=" GROUP BY COD_DEMANDA
                     ORDER BY D.IND_PRIORIDADE DESC, COD_DEMANDA";
//            echo $sql; die;
        return $this->selectDB($sql, false);
    }
    
    Public Function ContagemDemandasStatus($codUsuario){
        $sql= "SELECT COUNT( D.COD_DEMANDA) AS QTD,
                      S.COD_SITUACAO,
                      S.DSC_SITUACAO
                 FROM EN_DEMANDAS D
                INNER JOIN EN_SITUACAO S
                   ON D.COD_SITUACAO = S.COD_SITUACAO
                WHERE 1=1";
        if($codUsuario !== '1'){
            $sql .=" AND D.COD_RESPONSAVEIS = $codUsuario";
        }
            $sql .=" GROUP BY D.COD_SITUACAO
                     ORDER BY D.COD_SITUACAO";
//            echo $sql; die;
        return $this->selectDB($sql, false);
    }
    
    Public Function ContagemDemandasPrioridade($codUsuario){
        $sql= "SELECT COUNT( COD_DEMANDA) AS QTD,
                      IND_PRIORIDADE,
                      CASE WHEN IND_PRIORIDADE = '0' THEN 'Sem Prioridade'
                           WHEN IND_PRIORIDADE = '1' THEN 'Baixa'
                           WHEN IND_PRIORIDADE = '2' THEN 'Normal'
                           WHEN IND_PRIORIDADE = '3' THEN 'Alta'
                           WHEN IND_PRIORIDADE = '4' THEN 'Crítica'
                      END AS DSC_PRIORIDADE
                 FROM EN_DEMANDAS 
                WHERE 1=1";
        if($codUsuario !== '1'){
            $sql .=" AND COD_RESPONSAVEIS = $codUsuario";
        }
            $sql .=" GROUP BY IND_PRIORIDADE
                     ORDER BY IND_PRIORIDADE";
//            echo $sql; die;
        return $this->selectDB($sql, false);
    }
    
    Public Function ContagemDemandasTotal($codUsuario){
        $sql= "SELECT COUNT(COD_DEMANDA) AS QTD_TOTAL
                 FROM EN_DEMANDAS 
                WHERE 1=1";
        if($codUsuario !== '1'){
            $sql .=" AND COD_RESPONSAVEIS = $codUsuario";
        }
        return $this->selectDB($sql, false);
    }
    
    Public Function RetornaUsuariosDemanda($codDemanda){
        $sql = "SELECT UR.COD_USUARIO,
                       UR.NME_USUARIO_COMPLETO,
                       UR.TXT_EMAIL,
                       S.NME_BANCO,
                       D.COD_USUARIO AS COD_CRIADOR
                  FROM EN_DEMANDAS D
                  LEFT JOIN SE_USUARIO UR
                    ON D.COD_RESPONSAVEIS = UR.COD_USUARIO
                 INNER JOIN EN_SISTEMAS S
                    ON D.COD_SISTEMA_ORIGEM = S.COD_SISTEMA
                 WHERE D.COD_DEMANDA = ".$codDemanda;
        return $this->selectDB($sql, false);
    }
    
    Public Function RetornaDesenvolvedores(){
        $sql = "SELECT NME_USUARIO_COMPLETO,
                       TXT_EMAIL
                  FROM SE_USUARIO
                 WHERE COD_PERFIL = 2";
        return $this->selectDB($sql, false);
    }
    
    Public Function RetornaCriadorDemanda($nmeBanco, $codCriador){
        $sql = "SELECT NME_USUARIO_COMPLETO AS NME_CRIADOR,
                       TXT_EMAIL AS TXT_EMAIL_CRIADOR
                  FROM $nmeBanco.SE_USUARIO
                 WHERE COD_USUARIO = ".$codCriador;
        return $this->selectDB($sql, false);
    }
}