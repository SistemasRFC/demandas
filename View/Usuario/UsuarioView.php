<html>
  <head>
      <title>Demandas - Usuarios </title>
        <?php include "../../Resources/imports-html.php"; ?>
        <script src="../../View/Usuario/js/UsuarioView.js?rdm=<?php echo time(); ?>"></script>
    </head>
    <body>
      <div id="wrapper">
        <div id="content-wrapper" class="d-flex flex-column">
          <div id="content">
            <?php include "../../View/MenuPrincipal/Cabecalho.php"; ?>

            <div class="container-fluid">
              <div class="d-sm-flex align-items-center justify-content-between">
                <h1 class="h3 mb-0 text-gray-800">Restrito - <small>Usuário</small></h1>
              </div>

              <div class="row">
                <div class="col-xl-12 col-md-12 mx-0 px-0">
                  <div class="card h-100">
                    <div class="card-header d-flex align-items-end">
                      <button id="btnNovoUsuario" class="btn btn-primary d-lg-inline">Novo Usuário</button>
                    </div>
                    <div class="card-body">
                      <div class="container">
                        <div class="row">
                          <div id="tabelaUsuario" class="table-responsive"></div>
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
<?php include_once "CadUsuarioView.php";?>