<?php
include_once(PATH."Dao/BaseDao.php");
class DemandaDao extends BaseDao
{
    Protected $tableName = "EN_DEMANDAS";
    
    Protected $columns = array ("tpoDemanda"   => array("column" =>"TPO_DEMANDA", "typeColumn" =>"I"),
                                "dscDemanda"   => array("column" =>"DSC_DEMANDA", "typeColumn" =>"S"),
                                "codSistema"   => array("column" =>"COD_SISTEMA", "typeColumn" =>"I"),
                                "dtaDemanda"   => array("column" =>"DTA_DEMANDA", "typeColumn" =>"D"),
                                "codResponsavel"   => array("column" =>"COD_RESPONSAVEL", "typeColumn" =>"I"),
                                "codSituacao"   => array("column" =>"COD_SITUACAO", "typeColumn" =>"I"),
                                "indPrioridade"   => array("column" =>"IND_PRIORIDADE", "typeColumn" =>"I"),
                                "dtaFimDemanda"   => array("column" =>"DTA_FIM_DEMANDA", "typeColumn" =>"D"),
                                "codUsuario"   => array("column" =>"COD_USUARIO", "typeColumn" =>"I"),
                                "codSistemaOrigem"   => array("column" =>"COD_SISTEMA_ORIGEM", "typeColumn" =>"I"));
    
    Protected $columnKey = array("codDemanda"=> array("column" =>"COD_DEMANDA", "typeColumn" => "I"));
    
    Public Function __construct(){
        $this->conect();
    }

    Public Function ListarDemandas($codUsuario){
        $sql= "SELECT D.COD_DEMANDA,
                      floor(sum(GetDiasUteis(DTA_OPERACAO, coalesce(DTA_FIM_SITUACAO, now()))/60/60/24)) as DIAS_DECORRIDA,
                      COALESCE((select floor(sum(GetDiasUteis(DTA_OPERACAO, coalesce(DTA_FIM_SITUACAO, now()))/60/60/24)) as dia 
                         from en_log_situacao_demanda elsd 
                        where elsd.COD_situacao = 2
                          and COD_DEMANDA = d.COD_DEMANDA),0) as DIAS_DECORRIDAS,
                      COALESCE(VW.HORAS,0) AS HORAS_DECORRIDAS,           
                      COALESCE(TIMESTAMPDIFF(DAY,D.DTA_DEMANDA, COALESCE(D.DTA_FIM_DEMANDA, NOW())), 0) AS DIAS_CRIADO,
                      CASE WHEN TIMEDIFF(TIME(COALESCE(D.DTA_FIM_DEMANDA, NOW())), TIME(D.DTA_DEMANDA))<0 
                           THEN ADDTIME(TIMEDIFF(TIME(COALESCE(D.DTA_FIM_DEMANDA, NOW())), TIME(D.DTA_DEMANDA)), '24:00:00')
                      ELSE TIMEDIFF(TIME(COALESCE(D.DTA_FIM_DEMANDA, NOW())), TIME(D.DTA_DEMANDA)) END AS HORAS_CRIADO,
                      D.DSC_DEMANDA,
                      D.COD_SISTEMA,
                      D.COD_SISTEMA_ORIGEM,
                      S.NME_SISTEMA,
                      D.DTA_DEMANDA AS DATA_DEMANDA,
                      DATE_FORMAT(D.DTA_DEMANDA,'%d/%m/%Y %T') AS DTA_DEMANDA, 
                      D.COD_RESPONSAVEL,
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
                   ON D.COD_RESPONSAVEL = U.COD_USUARIO
                 left join en_log_situacao_demanda elsd 
                   on elsd.COD_DEMANDA = d.COD_DEMANDA 
                  and elsd.COD_situacao = 2
                  and elsd.DTA_OPERACAO = (select min(DTA_OPERACAO) 
                                              from en_log_situacao_demanda elsd2 
                                             where elsd2.COD_DEMANDA = elsd.COD_DEMANDA 
                                               and elsd2.COD_situacao = 2)
                 left join VW_CONTABILIZA_HORAS VW 
                   on VW.COD_DEMANDA = d.COD_DEMANDA 
                  and VW.COD_situacao = 2                                                 
                 LEFT JOIN EN_CONFIGURA_COR CC
                   ON TIME(VW.HORAS_TOTAL) BETWEEN CC.VLR_TEMPO_INICIAL AND CC.VLR_TEMPO_FINAL
                WHERE 1=1";
        if($this->Populate('comboTpoDemanda', 'I') !== '0'){
            $sql .=" AND D.COD_SITUACAO = ".$this->Populate('comboTpoDemanda', 'I');
        }
            $sql .=" GROUP BY COD_DEMANDA
                     ORDER BY D.COD_SITUACAO, DATA_DEMANDA DESC";
        return $this->selectDB($sql, false);
    }
    
    Public Function UpdateDemandas(){
        $responsavel = $this->Populate('codResponsavel','I');
        if($responsavel == ""){
        $sql = " UPDATE EN_DEMANDAS SET DSC_DEMANDA = '".$this->Populate('dscDemanda','S')."',
                                       COD_SISTEMA = ".$this->Populate('codSistema','I').",
                                       COD_SISTEMA_ORIGEM = '".$this->Populate('codSistemaOrigem','I')."',
                                       COD_SITUACAO = '".$this->Populate('codSituacao','I')."',
                                       IND_PRIORIDADE = '".$this->Populate('indPrioridade','I')."',
                                       TPO_DEMANDA = '".$this->Populate('tpoDemanda','I')."'
                 WHERE COD_DEMANDA = '".$this->Populate('codDemanda','I')."'";
        } else {
            $sql = " UPDATE EN_DEMANDAS SET DSC_DEMANDA = '".$this->Populate('dscDemanda','S')."',
                                           COD_SISTEMA = ".$this->Populate('codSistema','I').",
                                           COD_SISTEMA_ORIGEM = '".$this->Populate('codSistemaOrigem','I')."',
                                           COD_RESPONSAVEL = ".$this->Populate('codResponsavel','I').",
                                           COD_SITUACAO = '".$this->Populate('codSituacao','I')."',
                                           IND_PRIORIDADE = '".$this->Populate('indPrioridade','I')."',
                                           TPO_DEMANDA = '".$this->Populate('tpoDemanda','I')."'
                     WHERE COD_DEMANDA = '".$this->Populate('codDemanda','I')."'";
        }
        return $this->insertDB($sql);
    }

    Public Function FinalizaDemanda(){
        $sql = "UPDATE EN_DEMANDAS SET DSC_DEMANDA = '".$this->Populate('dscDemanda','S')."',
                                       COD_SISTEMA = ".$this->Populate('codSistema','I').",
                                       COD_SISTEMA_ORIGEM = '".$this->Populate('codSistemaOrigem','I')."',
                                       COD_RESPONSAVEL = '".$this->Populate('codResponsavel','I')."',
                                       COD_SITUACAO = '".$this->Populate('codSituacao','I')."',
                                       IND_PRIORIDADE = '".$this->Populate('indPrioridade','I')."',
                                       TPO_DEMANDA = '".$this->Populate('tpoDemanda','I')."',
                                       DTA_FIM_DEMANDA = NOW()
                 WHERE COD_DEMANDA = '".$this->Populate('codDemanda','I')."'";
        return $this->insertDB($sql);
    }

    Public Function InsertDemandas($codUsuario){
        $responsavel = $this->Populate('codResponsavel','I');
        // echo $this->Populate('codResponsavel','I')==""; die;
        if($responsavel == ""){
            $sql = "INSERT INTO EN_DEMANDAS
                    (   DSC_DEMANDA, 
                        COD_SISTEMA, 
                        COD_SISTEMA_ORIGEM, 
                        DTA_DEMANDA,
                        COD_SITUACAO,
                        IND_PRIORIDADE,
                        TPO_DEMANDA,
                        COD_USUARIO)
                    VALUES
                    (   '".$this->Populate('dscDemanda','S')."',
                        ".$this->Populate('codSistema','I').",
                        ".$this->Populate('codSistemaOrigem','I').",
                        NOW(),
                        '".$this->Populate('codSituacao','I')."',
                        '".$this->Populate('indPrioridade','I')."',
                        '".$this->Populate('tpoDemanda','I')."',
                        $codUsuario)";
            $codDemanda = "SELECT MAX(COD_DEMANDA) FROM EN_DEMANDAS";
            $return[2] = $this->selectDB($codDemanda, false);
            $return = $this->insertDB($sql);
            return $return;
        } else {
            $sql = "INSERT INTO EN_DEMANDAS
                    (   DSC_DEMANDA, 
                        COD_SISTEMA, 
                        COD_SISTEMA_ORIGEM, 
                        DTA_DEMANDA, 
                        COD_RESPONSAVEL, 
                        COD_SITUACAO,
                        IND_PRIORIDADE,
                        TPO_DEMANDA,
                        COD_USUARIO)
                    VALUES
                    (   '".$this->Populate('dscDemanda','S')."',
                        ".$this->Populate('codSistema','I').",
                        ".$this->Populate('codSistemaOrigem','I').",
                        NOW(), 
                        ".$responsavel.",
                        '".$this->Populate('codSituacao','I')."',
                        '".$this->Populate('indPrioridade','I')."',
                        '".$this->Populate('tpoDemanda','I')."',
                        $codUsuario)";
            $codDemanda = "SELECT MAX(COD_DEMANDA) FROM EN_DEMANDAS";
            $return[2] = $this->selectDB($codDemanda, false);
            $return = $this->insertDB($sql);
            return $return;

        }
    }
    
    Public Function RegistraSituacaoOperacao($codDemanda, $codSituacao, $tpoOperacao, $codUsuario, $codSistemaOrigem){
        $sql = " SELECT MAX(COD_OPERACAO) AS COD_OPERACAO FROM EN_LOG_SITUACAO_DEMANDA WHERE COD_DEMANDA = ".$codDemanda;
        $ultimoCodigo = $this->selectDB($sql, false);

        $sql = " UPDATE EN_LOG_SITUACAO_DEMANDA SET DTA_FIM_SITUACAO = NOW() WHERE COD_DEMANDA = ".$codDemanda." 
                    AND COD_OPERACAO = ".$ultimoCodigo[1][0]['COD_OPERACAO'];
        $this->insertDB($sql);

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
    
    Public Function ListarDemandasAguardando($codUsuario){
        $sql= "SELECT D.COD_DEMANDA,
                      D.DSC_DEMANDA,
                      D.COD_SISTEMA,
                      D.COD_SISTEMA_ORIGEM,
                      S.NME_SISTEMA,
                      SI.DSC_SITUACAO,
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
                   ON D.COD_RESPONSAVEL = U.COD_USUARIO
                INNER JOIN RE_USUARIO_SISTEMA US
                   ON S.COD_SISTEMA = US.COD_SISTEMA
                WHERE D.COD_SITUACAO = 1
                  AND D.COD_RESPONSAVEL IS NULL
                  AND US.COD_USUARIO = ".$codUsuario."
                GROUP BY COD_DEMANDA
                ORDER BY DATA_DEMANDA";
        return $this->selectDB($sql, false);
    }
    
    Public Function ListarDemandasUsuario($codUsuario){
        $sql= "SELECT D.COD_DEMANDA,
                      D.DSC_DEMANDA,
                      D.DTA_DEMANDA AS DATA_DEMANDA,
                      DATE_FORMAT(D.DTA_DEMANDA,'%d/%m/%Y %T') AS DTA_DEMANDA, 
                      D.COD_RESPONSAVEL,
                      D.COD_SISTEMA,
                      S.NME_SISTEMA,
                      D.COD_SISTEMA_ORIGEM,
                      U.NME_USUARIO_COMPLETO,
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
                      D.TPO_DEMANDA
                 FROM EN_DEMANDAS D
                INNER JOIN EN_SISTEMAS S
                   ON D.COD_SISTEMA = S.COD_SISTEMA
                INNER JOIN EN_SITUACAO SI
                   ON D.COD_SITUACAO = SI.COD_SITUACAO
                 LEFT JOIN SE_USUARIO U
                   ON D.COD_RESPONSAVEL = U.COD_USUARIO
                WHERE D.COD_SITUACAO NOT IN (6,7)";
        if($codUsuario !== '1'){
            $sql .=" AND D.COD_RESPONSAVEL = $codUsuario";
        }
            $sql .=" GROUP BY COD_DEMANDA
                     ORDER BY D.IND_PRIORIDADE DESC, COD_DEMANDA";
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
                    ON D.COD_RESPONSAVEL = UR.COD_USUARIO
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
    
    Public Function MudarResponsavelDemanda($codUsuario){
        $sql = "UPDATE EN_DEMANDAS SET COD_RESPONSAVEL= $codUsuario WHERE COD_DEMANDA = ".$this->Populate('codDemanda', 'I');
        return $this->insertDB($sql, false);
    }
}