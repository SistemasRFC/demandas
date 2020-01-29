<?php
session_start();
if (!isset($_SESSION['cod_usuario'])){
    header("Location: index.php");
}
include_once 'Constantes.php';
include_once(PATH."Dao/BaseDao.php");
$bd = new BaseDao();

if (!isset($form)){
    $form='';
}
if (!isset($_POST['sql'])){
    $_POST['sql']='';
}

if ($_POST['sql']!=''){
    $rs = $bd->selectDB($_POST['sql'], false);
    if($rs[0]){
        $rs = $rs[1];
        $tabela = "<table border='1'><tr>";
        $cabecalho = true;
        $total = count($rs);
        $conf = false;
        foreach($rs as $k => $v){ 
            foreach($v as $kk =>$vv){

                if ($cabecalho){
                    if ($conf){
                        $tabela .= "<td>".$kk."</td>";  
                        $conf = false;
                    }else{
                        $conf = true;
                    }            
                }
            }        
            $cabecalho=false;
        }  
        $tabela .= '</tr>';
        $conf = true;
        foreach($rs as $k => $v){
            $tabela .= '<tr>';
            foreach($v as $kk =>$vv){
                if ($conf){
                    $tabela .= "<td>".$vv."</td>";  
                    $conf = false;
                }else{
                    $conf = true;
                }              

            }
            $tabela .= "</tr>";
        }
        $tabela .= "</table>";
    }
}
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/HTML; charset=utf-8">
		<script type="text/javascript" src="Resources/jquery-ui-1.10.3.custom/js/jquery-1.9.1.js"></script>
		<script src="Resources/shortcut.js?rdm=<?php echo time(); ?>"></script>
    </head>
	
    <body>
        <form name="form" id="formSql" method="post">
            <table>
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td align="left">
                                    <textarea id="sql" name="sql" cols="100" rows="10"><?php echo isset($_POST['sql'])?$_POST['sql']:''; ?></textarea>
                                </td>
                                <td align="left">
                                    <textarea id="sqlAnterior" name="sqlAnterior" cols="100" rows="10"><?php echo isset($_POST['sqlAnterior'])?$_POST['sqlAnterior']:''; ?></textarea>
                                </td>
                            </tr>                            
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" id="btnGerar" value="Gerar"></br> 
                                    <?php
                                        echo isset($tabela) ? $tabela : var_dump($rs);
                                    ?>
                                    <?php
                                        echo count($rs).' Registros ';
                                    ?>                       
                    </td>
                </tr>
            </table>  
        </form>
    </body>
</html>
<script type="text/javascript">
	
    shortcut.add("F9",function(){
        $("#btnGerar").click();
    }); 	
</script>