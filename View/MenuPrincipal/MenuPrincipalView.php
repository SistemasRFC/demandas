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