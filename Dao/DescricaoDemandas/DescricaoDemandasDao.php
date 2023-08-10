<?php
include_once(PATH."Dao/BaseDao.php");
class DescricaoDemandasDao extends BaseDao
{
    Protected $tableName = "RE_DESCRICAO_DEMANDA";
    
    Protected $columns = array ("codDemanda"        => array("column" =>"COD_DEMANDA",        "typeColumn" =>"I"),
                                "txtDescricao"      => array("column" =>"TXT_DESCRICAO",      "typeColumn" =>"S"),
                                "tpoDescricao"      => array("column" =>"TPO_DESCRICAO",      "typeColumn" =>"S"),
                                "dtaDescricao"      => array("column" =>"DTA_DESCRICAO",      "typeColumn" =>"D"),
                                "codUsuario"        => array("column" =>"COD_USUARIO",        "typeColumn" =>"I"),
                                "codSistemaOrigem"  => array("column" =>"COD_SISTEMA_ORIGEM", "typeColumn" =>"I"),
                                "indRevisao"        => array("column" =>"IND_REVISAO",        "typeColumn" =>"S"));

    Protected $columnKey = array("codDescricao"=> array("column" =>"COD_DESCRICAO", "typeColumn" => "I"));

    // Public Function __construct(){
    //     $this->conect();
    // }

    Public Function ListarDescricaoDemandas() {
        $sql = "SELECT D.COD_DEMANDA,
                       DD.COD_DESCRICAO,
                       DD.TXT_DESCRICAO AS TXT_DESCRICAO_TOTAL,
                       CASE WHEN LENGTH(DD.TXT_DESCRICAO)>80 THEN CONCAT(SUBSTRING(DD.TXT_DESCRICAO,1,80),'...') ELSE DD.TXT_DESCRICAO END AS TXT_DESCRICAO,
                       DATE_FORMAT(DD.DTA_DESCRICAO,'%d/%m/%Y %T') AS DTA_DESCRICAO,
                       CASE WHEN DD.TPO_DESCRICAO = 'R' THEN 'Requisito'
                            WHEN DD.TPO_DESCRICAO = 'O' THEN 'Observação'
                            WHEN DD.TPO_DESCRICAO = 'S' THEN 'Script'
                       END AS TPO_DESCRICAO,
                       DD.COD_SISTEMA_ORIGEM,
                       DD.COD_USUARIO,
                       S.NME_BANCO,
                       CASE DD.IND_REVISAO WHEN 'P' THEN 'fa-solid fa-grip-lines'
                                           WHEN 'A' THEN 'text-success fa-regular fa-thumbs-up'
                                           WHEN 'R' THEN 'text-danger fa-regular fa-thumbs-down'
                       ELSE 'fa-solid fa-grip-lines'
                       END AS REVISAO,
                       COALESCE(DD.IND_REVISAO, 'P') AS IND_REVISAO
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
                    COD_SISTEMA_ORIGEM,
                    IND_REVISAO)
                VALUES
                (   '".$this->Populate('codDemanda','I')."',
                    '".$this->Populate('txtDescricao','S')."',
                    '".$this->Populate('tpoDescricao','S')."',
                    NOW(),
                    $codUsuario,
                    '".$this->Populate('codSistemaOrigem','I')."',
                    'P')";
        return $this->insertDB($sql);
    }

    Public Function UpdateDescricaoDemandas() {
        $sql = "UPDATE RE_DESCRICAO_DEMANDA
                   SET TXT_DESCRICAO = '".$this->Populate('txtDescricao', 'S')."',
                       TPO_DESCRICAO = '".$this->Populate('tpoDescricao', 'S')."'
                 WHERE COD_DESCRICAO = ".$this->Populate('codDescricao', 'I');
        return $this->insertDB($sql);
    }

    Public Function DeleteDescricaoDemandas(){
        $sql = "DELETE FROM RE_DESCRICAO_DEMANDA WHERE COD_DESCRICAO = ".$this->Populate('codDescricao', 'I');
        return $this->insertDB($sql);
    }

    Public Function UpdateRevisaoDescricao() {
        $indRevisao = $this->Populate('indRevisao', 'S');
        $codDescricao = $this->Populate('codDescricao', 'I');
        $sql = "UPDATE RE_DESCRICAO_DEMANDA
                   SET IND_REVISAO = '$indRevisao'
                 WHERE COD_DESCRICAO = $codDescricao";
        return $this->insertDB($sql);
    }

    // Public Function UpdateRevisaoTodasDescricaoTodas($indRevisao, $codDemanda) {
    //     $sql = "UPDATE RE_DESCRICAO_DEMANDA
    //                SET IND_REVISAO = '$indRevisao'
    //              WHERE COD_DEMANDA = $codDemanda;
    //     return $this->insertDB($sql);
    // }

    public function UpdateDescricoesReprovadas($codDemanda) {
        $sql = "UPDATE RE_DESCRICAO_DEMANDA
                   SET IND_REVISAO = 'P'
                 WHERE COD_DEMANDA = $codDemanda
                   AND IND_REVISAO = 'R'";
        return $this->insertDB($sql);
    }
}