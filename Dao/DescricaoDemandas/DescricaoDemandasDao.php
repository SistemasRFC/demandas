<?php
include_once(PATH."Dao/BaseDao.php");
class DescricaoDemandasDao extends BaseDao
{
    Protected $tableName = "RE_DESCRICAO_DEMANDA";
    
    Protected $columns = array ("codDemanda"   => array("column" =>"COD_DEMANDA", "typeColumn" =>"I"),
                                "txtDescricao"   => array("column" =>"TXT_DESCRICAO", "typeColumn" =>"S"),
                                "tpoDescricao"   => array("column" =>"TPO_DESCRICAO", "typeColumn" =>"S"),
                                "dtaDescricao"   => array("column" =>"DTA_DESCRICAO", "typeColumn" =>"D"),
                                "codUsuario"   => array("column" =>"COD_USUARIO", "typeColumn" =>"I"),
                                "codSistemaOrigem"   => array("column" =>"COD_SISTEMA_ORIGEM", "typeColumn" =>"I"));
    
    Protected $columnKey = array("codDescricao"=> array("column" =>"COD_DESCRICAO", "typeColumn" => "I"));
    
    Public Function DescricaoDemandasDao(){
        $this->conect();
    }

    Public Function ListarDescricaoDemandas(){
        $sql = "SELECT D.COD_DEMANDA,
                       DD.COD_DESCRICAO,
                       DD.TXT_DESCRICAO AS TXT_DESCRICAO_TOTAL,
                       CASE WHEN LENGTH(DD.TXT_DESCRICAO)>50 THEN CONCAT(SUBSTRING(DD.TXT_DESCRICAO,1,50),'...') ELSE DD.TXT_DESCRICAO END AS TXT_DESCRICAO,
                       DATE_FORMAT(DD.DTA_DESCRICAO,'%d/%m/%Y %T') AS DTA_DESCRICAO,
                       CASE WHEN DD.TPO_DESCRICAO = 'R' THEN 'Requisito'
                            WHEN DD.TPO_DESCRICAO = 'O' THEN 'Observação'
                            WHEN DD.TPO_DESCRICAO = 'S' THEN 'Script'
                       END AS TPO_DESCRICAO,
                       DD.COD_SISTEMA_ORIGEM,
                       DD.COD_USUARIO,
                       S.NME_BANCO
                  FROM RE_DESCRICAO_DEMANDA DD
                 INNER JOIN EN_SISTEMAS S
                    ON DD.COD_SISTEMA_ORIGEM = S.COD_SISTEMA
                 INNER JOIN EN_DEMANDAS D
                    ON DD.COD_DEMANDA = D.COD_DEMANDA
                 WHERE D.COD_DEMANDA = '".$this->Populate('codDemanda','I')."'";
        return $this->selectDB($sql, false);
    }

    Public Function InsertDescricaoDemandas($codUsuario){
        $sql = "INSERT INTO RE_DESCRICAO_DEMANDA
                (   COD_DEMANDA,
                    TXT_DESCRICAO,
                    TPO_DESCRICAO,
                    DTA_DESCRICAO,
                    COD_USUARIO,
                    COD_SISTEMA_ORIGEM)
                VALUES
                (   '".$this->Populate('codDemanda','I')."',
                    '".$this->Populate('txtDescricao','S')."',
                    '".$this->Populate('tpoDescricao','S')."',
                    NOW(),
                    $codUsuario,
                    '".$this->Populate('codSistemaOrigem','I')."')";
        return $this->insertDB($sql);
    }

    Public Function DeleteDescricaoDemandas(){
        $sql = "DELETE FROM RE_DESCRICAO_DEMANDA WHERE COD_DESCRICAO = ".$this->Populate('codDescricao', 'I');
        return $this->insertDB($sql);
    }
}