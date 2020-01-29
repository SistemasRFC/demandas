<html>
    <title> Demandas </title>
    <head>
        <script src="../../Resources/jquery/jquery-1.10.1.min.js"></script>
        <script src="../../Resources/bootstrap/js/popper.min.js"></script>
        <script src="../../Resources/bootstrap/js/bootstrap.min.js"></script>
        <!-- Bootstrap core CSS -->
        <link href="../../Resources/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="../../Resources/bootstrap/css/dashboard.css" rel="stylesheet">
        <script src="../../Resources/swal/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../../Resources/swal/dist/sweetalert.css">           
        <!-- DataTables -->
        <link rel="stylesheet" type="text/css" href="../../Resources/datatable/datatable.css"/> 
        <script type="text/javascript" src="../../Resources/datatable/datatable.js"></script>
        <script src="../../View/Demandas/js/DemandasView.js?rdm=<?php echo time(); ?>"></script>

        <meta http-equiv="Content-Type" content="text/html; charset=utf8">
    </head>
    <body>
        <?php include "../../View/MenuPrincipal/Cabecalho.php"; ?>
        <input type="hidden" id="codDemanda">
        <input type="hidden" id="codSituacaoAnterior">
        <input type="hidden" id="codSituacao" value="<?php echo isset($_POST['codSituacao'])?$_POST['codSituacao']:'';?>">
        <input type="hidden" id="codSistemaOrigem">
        
        <div class="container-fluid" id="tdDemandas">
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-3">
                    <input type="button" id="btnNovaDemanda" class="btn btn-secondary" value="Nova Demanda">
                </div>
                <div class="col-3">
                    <div id="divComboTpoDemanda"></div>
                </div>
                <div class="col-2">
                    <input type="button" id="btnPesquisarDemanda" class="btn btn-primary" value="Pesquisar">
                </div>
            </div>
            <div class="row">&nbsp;</div>
        </div>
        <div class="container">
            <div class="row">
                <div id="tabelaDemandas" class="table-responsive"></div>
            </div>
        </div>
    </body>
</html>
<div class="modal fade bd-example-modal-lg" id="updateDemanda" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Editar Demanda</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php include_once "CadDemandasView.php";?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
        <button type="button" class="btn btn-info" id="btnHistorico">Histórico</button>
        <button type="button" class="btn btn-info" id="btnDescricao">Inserir Descrição</button>
        <button type="button" class="btn btn-info" id="btnArquivos">Arquivos</button>
        <button type="button" class="btn btn-primary" id="btnSalvarDemanda">Salvar</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade bd-modal-lg" id="descricaoDemanda" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Descrição da Demanda</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body modal-lg">
        <?php include_once "CadDescricaoView.php";?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
        <button type="button" class="btn btn-primary" id="btnSalvarDescricao">Salvar</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade bd-modal-lg" id="historicoDemanda" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Histórico da Demanda</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body modal-lg">
          <div class="container">
            <div class="row">
                <div id="tabelaHistorico" class="table-responsive"></div>
            </div>
          </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade bd-modal-lg" id="textoDescricao" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Descrição</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body modal-lg">
          <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <textarea class="form-control" id="txtDescricaoTotal" rows="5"></textarea>
                    </div>
                </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
        </div>
    </div>
  </div>
</div>
<div class="modal fade bd-modal-lg" id="ArquivosDemanda" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Arquivos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body modal-lg">
            <?php include_once "CadArquivoView.php";?>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
            <button type="button" class="btn btn-primary" id="btnSalvarArquivo">Salvar</button>
        </div>
    </div>
  </div>
</div>