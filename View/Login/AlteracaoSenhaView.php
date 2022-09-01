<html>
    <head>
        <title>Demandas - Alterar Senha</title>
        <?php include "../../Resources/imports-html.php"; ?>
        <script src="js/AlteracaoSenhaView.js"></script>
    </head>
    <body>
        <div class="card card-login">
            <div class="card-header bg-color-primary" align="center">            
                <h1>Demandas</h1> 
                <h5>ALTERAR SENHA</h5>
            </div>
            <div class="card-body">
                <label class="mb-0" for="txtSenhaAtual">Senha Atual</label>
                <input type="password" id="txtSenhaAtual" class="form-control mb-1">
                <label class="mb-0" for="txtSenhaNova">Nova Senha</label>
                <input type="password" id="txtSenhaNova" class="form-control mb-1">
                <label class="mb-0" for="txtSenhaConfirmacao">Confirmar Nova Senha</label>
                <input type="password" id="txtSenhaConfirmacao" class="form-control">
            </div>

            <div class="card-footer" align="center">
                <button class="btn btn-primary btn-block" id="btnLogin">Enviar</button>
            </div>
        </div>
    </body>
</html>

