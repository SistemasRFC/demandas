<?php
include_once(PATH."Dao/BaseDao.php");
class SituacaoDao extends BaseDao
{
    Protected $tableName = "EN_SITUACAO";
    
    Protected $columns = array ("dscSituacao"   => array("column" =>"DSC_SITUACAO", "typeColumn" =>"S"));
    
    Protected $columnKey = array("codSituacao"=> array("column" =>"COD_SITUACAO", "typeColumn" => "I"));
    
    Public Function __construct(){
        $this->conect();
    }

    Public Function ListarSituacao() {
        $sql = "SELECT COD_SITUACAO AS ID,
                       DSC_SITUACAO AS DSC,
                       COD_SITUACAO,
                       DSC_SITUACAO
                  FROM EN_SITUACAO";
        return $this->SelectDB($sql, false);
    }

    Public Function UpdateSituacao(){
        return $this->MontarUpdate();
    }

    Public Function InsertSituacao(){
        return $this->MontarInsert();
    }
}