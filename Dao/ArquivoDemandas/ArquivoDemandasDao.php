<?php
include_once(PATH."Dao/BaseDao.php");
class ArquivoDemandasDao extends BaseDao
{
    Protected $tableName = "RE_ARQUIVO_DEMANDA";
    
    Protected $columns = array ("codDemanda"   => array("column" =>"cod_demanda", "typeColumn" =>"I"),
                                "dscArquivo"   => array("column" =>"DSC_ARQUIVO", "typeColumn" =>"S"),
                                "txtCaminhoArquivo"   => array("column" =>"TXT_CAMINHO_ARQUIVO", "typeColumn" =>"S"),
                                "dtaArquivo"   => array("column" =>"dta_arquivo", "typeColumn" =>"D"));
    
    Protected $columnKey = array("codArquivo"=> array("column" =>"cod_arquivo", "typeColumn" => "I"));
    
    Public Function ArquivoDemandasDao(){
        $this->conect();
    }

    Public Function ListarArquivoDemandas(){
        $sql = "SELECT COD_ARQUIVO,
                       DATE_FORMAT(DTA_ARQUIVO, '%d/%m/%Y %T') AS DTA_ARQUIVO,
                       DSC_ARQUIVO,
                       TXT_CAMINHO_ARQUIVO
                  FROM RE_ARQUIVO_DEMANDA
                 WHERE COD_DEMANDA = ".$this->Populate('codDemanda', 'I');
        return $this->selectDB($sql, false);
    }

    Public Function DeleteArquivoDemandas(){
        $sql = "DELETE FROM RE_ARQUIVO_DEMANDA WHERE COD_ARQUIVO = ".$this->Populate('codArquivo', 'I');
        return $this->insertDB($sql);
    }

    Public Function InsertArquivoDemandas(){
        $sql = "INSERT INTO RE_ARQUIVO_DEMANDA
                           (COD_DEMANDA,
                            DSC_ARQUIVO,
                            TXT_CAMINHO_ARQUIVO,
                            DTA_ARQUIVO)
                     VALUES(".$this->Populate('codDemanda','I').",
                            '".$this->Populate('dscArquivo','S')."',
                            '".$this->Populate('arquivoScript','S')."',
                            NOW())";
        return $this->insertDB($sql);
    }
}