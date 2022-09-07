<?php
include_once(PATH."Model/BaseModel.php");
include_once(PATH."Dao/ArquivoDemandas/ArquivoDemandasDao.php");
class ArquivoDemandasModel extends BaseModel
{
    public function ArquivoDemandasModel(){
        If (!isset($_SESSION)){
            ob_start();
            session_start();
        }
    }

    Public Function ListarArquivoDemandas($Json=true){
        $dao = new ArquivoDemandasDao();
        $lista = $dao->ListarArquivoDemandas();
        if ($lista[0]){
            for($i=0;$i<count($lista[1]);$i++){
                $tipo = explode('.', $lista[1][$i]['TXT_CAMINHO_ARQUIVO']);
                $lista[1][$i]['DSC_TIPO_ARQUIVO'] = $this->RetornaIconeTipo($tipo[count($tipo)-1]);
            }
        }
        if ($Json){
            return json_encode($lista);
        }else{
            return $lista;        
        }
    }
    
    Public Function RetornaIconeTipo($tipo){
        switch ($tipo) {
            case 'sql':
                return '../../Resources/images/icone_sql.png';

                break;
            case 'txt':
                return '../../Resources/images/icone_txt.png';

                break;
            case 'js':
                return '../../Resources/images/icone_js.png';

                break;
            case 'php':
                return '../../Resources/images/icone_php.png';

                break;
            case 'doc':
                return '../../Resources/images/icone_doc.png';

                break;
            case 'docx':
                return '../../Resources/images/icone_docx.png';

                break;
            case 'xls':
                return '../../Resources/images/icone_xls.png';

                break;
            case 'pdf':
                return '../../Resources/images/icone_pdf.png';

                break;
            case 'jpg':
                return '../../Resources/images/icone_jpg.png';

                break;
            case 'png':
                return '../../Resources/images/icone_png.png';

                break;
            case 'rar':
                return '../../Resources/images/icone_rar.png';

                break;
            case 'zip':
                return '../../Resources/images/icone_zip.png';

                break;
            default:
                break;
        }
    }
    
    Public Function InsertArquivoDemandas(){
        $dao = new ArquivoDemandasDao();        
        $result = $dao->InsertArquivoDemandas();
        return json_encode($result);        
    }

    Public Function DeleteArquivoDemandas(){
        $dao = new ArquivoDemandasDao();
        $result = $dao->DeleteArquivoDemandas();
        return json_encode($result);
    }	
    
}

