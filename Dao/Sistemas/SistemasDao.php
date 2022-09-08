<?php
include_once(PATH."Dao/BaseDao.php");
class SistemasDao extends BaseDao
{
    Protected $tableName = "EN_SISTEMAS";
    
    Protected $columns = array ("nmeSistema"   => array("column" =>"NME_SISTEMA", "typeColumn" =>"S"),
                                "nmeBanco"   => array("column" =>"NME_BANCO", "typeColumn" =>"S"),
                                "indAtivo"   => array("column" =>"IND_ATIVO", "typeColumn" =>"S"));
    
    Protected $columnKey = array("codSistema"=> array("column" =>"COD_SISTEMA", "typeColumn" => "I"));
    
    Function  __construct(){
        $this->conect();
    }

    Public Function ListarSistemas(){
        $sql = "SELECT COD_SISTEMA,
                       NME_SISTEMA,
                       COALESCE(NME_BANCO, ' Não informado') AS NME_BANCO,
                       CASE WHEN IND_ATIVO = 'S' THEN 'Sim'
                            WHEN IND_ATIVO = 'N' THEN 'Não'
                       END AS IND_ATIVO     
                  FROM EN_SISTEMAS
                 WHERE NME_SISTEMA <> ''
                 ORDER BY COD_SISTEMA";
        return $this->SelectDB($sql, false);
    }

    Public Function ListaSistemasAtivos(){
        $sql = "SELECT COD_SISTEMA,
                       NME_SISTEMA     
                  FROM EN_SISTEMAS
                 WHERE IND_ATIVO = 'S'";
        return $this->SelectDB($sql, false);
    }

    Public Function UpdateSistemas(){
        $sql = "UPDATE EN_SISTEMAS 
                   SET NME_SISTEMA = '".$this->Populate('nmeSistema', 'S')."',
                       NME_BANCO = '".$this->Populate('nmeBanco', 'S')."',
                       IND_ATIVO ='".$this->Populate('indAtivo', 'S')."'
                 WHERE COD_SISTEMA = '".$this->Populate('codSistema', 'I')."'";
        return $this->insertDB($sql);
    }

    Public Function InsertSistemas(){
        return $this->MontarInsert();
    }

    Public Function ListarSistemasAtivosPorUsuario($codUsuario){
        $sql = "SELECT S.COD_SISTEMA,
                       S.NME_SISTEMA     
                  FROM EN_SISTEMAS S
                 INNER JOIN RE_USUARIO_SISTEMA US ON S.COD_SISTEMA = US.COD_SISTEMA
                 WHERE IND_ATIVO = 'S'
                   AND COD_USUARIO = $codUsuario";
        return $this->SelectDB($sql, false);
    }
}
