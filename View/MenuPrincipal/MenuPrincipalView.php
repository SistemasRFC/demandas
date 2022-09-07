<html>
    <head>
        <title>Demandas - Início</title>
        <?php include "../../Resources/imports-html.php"; ?>
        <script src="../../View/MenuPrincipal/js/MenuPrincipalView.js?rdm=<?php echo time(); ?>"></script>
    </head>

    <body>
      <div id="wrapper">
        <div id="content-wrapper" class="d-flex flex-column">
          <div id="content">
            <?php include "Cabecalho.php"; ?>
            <div class="container-fluid">
              <div class="d-sm-flex align-items-center justify-content-between">
                  <h1 class="h3 mb-0 text-gray-800">Início</h1>
              </div>

              <div class="row mb-3">
                  <div class="col-xl-12 col-md-12">
                      <div class="card h-100 mx-auto">
                          <div class="card-header d-flex flex-row align-items-center justify-content-between">
                              <h6 class="m-0 font-weight-bold">MINHAS DEMANDAS</h6>
                          </div>
                          <div class="card-body">
                            <div class="container">
                              <div class="row">
                                <div id="tbDemandasUsuario" class="table"></div>
                              </div>
                            </div>
                          </div>
                      </div>
                  </div>
              </div>

              <div class="row">
                  <div class="col-xl-12 col-md-12">
                      <div class="card h-100 mx-auto">
                          <div class="card-header d-flex flex-row align-items-center justify-content-between">
                              <h6 class="m-0 font-weight-bold">DEMANDAS AGUARDANDO ATENDIMENTO</h6>
                          </div>
                          <div class="card-body">
                            <div class="container">
                              <div class="row">
                                <div id="tbDemandasAguardando" class="table"></div>
                              </div>
                            </div>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </body>
</html>
<?php include_once "../Demandas/VisuDemandasView.php";?>

<!-- <div class="modal fade bd-modal-lg" id="descricaoDemanda" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Descrição da Demanda</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body modal-lg"> -->
        <?php include_once "../Demandas/CadDescricaoView.php";?>
      <!-- </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="btnSalvarDescricao">Salvar</button>
      </div>
    </div>
  </div>
</div> -->