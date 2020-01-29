<?php
include_once(PATH."Dao/BaseDao.php");
class ConfiguraCorDao extends BaseDao
{
    Protected $tableName = "EN_CONFIGURA_COR";
    
    Protected $columns = array ("vlrTempoInicial"   => array("column" =>"VLR_TEMPO_INICIAL", "typeColumn" =>"time"),
                                "vlrTempoFinal"   => array("column" =>"VLR_TEMPO_FINAL", "typeColumn" =>"time"),
                                "dscCor"   => array("column" =>"DSC_COR", "typeColumn" =>"S"));
    
    Protected $columnKey = array("codConfiguraCor"=> array("column" =>"COD_CONFIGURA_COR", "typeColumn" => "I"));
    
    Public Function ConfiguraCorDao(){
        $this->conect();
    }

    Public Function ListarConfiguraCor(){    
        return $this->MontarSelect();
    }

    Public Function UpdateConfiguraCor(){
        $sql = "UPDATE EN_CONFIGURA_COR SET VLR_TEMPO_INICIAL = '".$this->Populate('vlrTempoInicial','S')."',
                                       VLR_TEMPO_FINAL = '".$this->Populate('vlrTempoFinal','S')."',
                                       DSC_COR = '".$this->Populate('dscCor','S')."'
                 WHERE COD_CONFIGURA_COR = ".$this->Populate('codConfiguraCor','I');
        return $this->insertDB($sql);
    }

    Public Function InsertConfiguraCor(){
        $sql = "INSERT INTO EN_CONFIGURA_COR
                (   VLR_TEMPO_INICIAL,
                    VLR_TEMPO_FINAL,
                    DSC_COR)
                VALUES
                (   '".$this->Populate('vlrTempoInicial', 'S')."',
                    '".$this->Populate('vlrTempoFinal', 'S')."',
                    '".$this->Populate('dscCor', 'S')."'
                )";
        return $this->insertDB($sql);
    }
}