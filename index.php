
<!doctype html>
<html>
  <head>
    <?php include "Resources/imports-html.php"; ?>
    <script src="index.js?rdm=<?php echo time();?>"></script>
  </head>

  <body style="background-color: #222">

    <div class="container">

      <div class="card my-5">
          <div class="card-body">
              <div class="row">
                  <div class="col-lg-6" style="padding-top: 7rem">
                      <h1 align="center" class="color-primary">Demandas</h1>
                      <h2 align="center" class="color-secondary">Sistema de apoio ao desenvolvimento</h2>
                  </div>
                  <div class="col-lg-6 p-5 bl-1">
                      <div align="center">
                          <h1 class="h4 text-gray-800 mb-4 color-primary">LOGIN</h1>
                      </div>
                      <form class="px-5">
                          <div class="form-group">
                              <label for="nmeLogin" class="mb-0">Usuário</label>
                              <input type="text" id="nmeLogin" name="nmeLogin" class='persist input form-control' placeholder="Login">
                          </div>
                          <div class="form-group">
                              <label for="txtSenha" class="mb-0">Senha</label>
                              <input type="password" id="txtSenha" name="txtSenha" class='persist input form-control' placeholder="Senha">
                          </div>
                          <input type="button" id="btnLogin" value="Entrar" class="btn btn-primary btn-user btn-block">
                      </form>
                      <hr>
                      <div class="text-center">
                          <a class="small" href="RecuperarSenha.php">Esqueci a senha</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </div>
  </body>
</html>
