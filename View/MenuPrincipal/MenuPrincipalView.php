<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Menu Principal</title>
<!--        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery.min.js"><\/script>')</script>-->
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
        <script src="../../View/MenuPrincipal/js/MenuPrincipalView.js?rdm=<?php echo time(); ?>"></script>
    </head>

    <body>
        <?php include "Cabecalho.php"; ?>
        <input type="hidden" id="codDemanda">
        <div class="container-fluid">
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-6">
                    <h4>Demandas Aguardando Atendimento</h4>
                    <div class="container-fluid">
                        <div id="tbDemandasPendentes" class="table-responsive"></div>
                    </div>
                </div>
                <div class="col-6">
                    <h4>Minhas Demandas</h4>
                    <div class="container-fluid">
                        <div id="tbDemandasUsuario" class="table-responsive"></div>
                    </div>
                </div>
            </div>
            <div class="row">&nbsp;</div>
            <div class="row" ><div class="col-12" align="center"><h5>Contagem de Demandas</h5></div></div>
            <div class="row">
                <div class="col-4">
                    <div class="container">
                        <div id="tbContagemStatus" class="table-responsive"></div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="container">
                        <div id="tbContagemPrioridade" class="table-responsive"></div>
                    </div>
                </div>
                <div class="col-1"></div>
                <div class="col-2" align="center">
                    <div class="container">
                        <div id="tbContagemTotal" class="table-responsive"></div>
                    </div>
                </div>
                <div class="col-1"></div>
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">&nbsp;</div>
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
        <?php include_once "../Demandas/CadDemandasView.php";?>
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
        <?php include_once "../Demandas/CadDescricaoView.php";?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
        <button type="button" class="btn btn-primary" id="btnSalvarDescricao">Salvar</button>
      </div>
    </div>
  </div>
</div>