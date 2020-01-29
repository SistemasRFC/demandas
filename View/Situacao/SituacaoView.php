<html>
    <title> Cadastro de Situações </title>
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
        <script src="../../View/Situacao/js/SituacaoView.js?rdm=<?php echo time(); ?>"></script>
        <meta http-equiv="Content-Type" content="text/html; charset=utf8">
    </head>
    <body>
        <?php include "../../View/MenuPrincipal/Cabecalho.php"; ?>
        <input type="hidden" id="codSituacao">
        <div class="container-fluid">
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-1">
                    <input type="button" id="btnNovaSituacao" class="btn btn-secondary" value="Novo">
                </div>
            </div>
            <div class="row">&nbsp;</div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-3">
                    <div id="tabelaSituacao" class="table-responsive"></div>
                </div>
            </div>
        </div>
    </body>
</html>
<div class="modal fade bd-example-modal-lg" id="cadSituacao" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Cadastro de Situação</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php include_once "CadSituacaoView.php";?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
        <button type="button" class="btn btn-primary" id="btnSalvarSituacao">Salvar</button>
      </div>
    </div>
  </div>
</div>