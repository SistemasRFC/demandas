<html>
    <title> Configuração de cores </title>
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
        <!-- DateTimePicker -->
<!--        <link rel="stylesheet" type="text/css" href="../../Resources/dateTimePicker/bootstrap-timepicker.min.css"/> 
        <script type="text/javascript" src="../../Resources/dateTimePicker/bootstrap-timepicker.min.js"></script>-->
        <script src="../../View/ConfiguraCor/js/ConfiguraCorView.js?rdm=<?php echo time(); ?>"></script>
        <meta http-equiv="Content-Type" content="text/html; charset=utf8">
    </head>
    <body>
        <?php include "../../View/MenuPrincipal/Cabecalho.php"; ?>
        <input type="hidden" id="codConfiguraCor">
        <div class="container-fluid" id="tdCores">
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-1">
                    <input type="button" id="btnNovoPeriodo" class="btn btn-secondary" value="Novo">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div id="tabelaPeriodos" class="table-responsive"></div>
            </div>
        </div>
    </body>
</html>
<div class="modal fade bd-example-modal-lg" id="cadCorPeriodo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Editar Configuração</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php include_once "CadCorView.php";?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
        <button type="button" class="btn btn-primary" id="btnSalvarPeriodo">Salvar</button>
      </div>
    </div>
  </div>
</div>