<html>
    <head>
        <title>Sistema de Gerenciamento de Demandas</title><!-- Bootstrap core CSS -->
        <link href="../../Resources/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <script src="../../Resources/jquery/jquery-1.10.1.min.js"></script>
        <!-- Custom styles for this template -->
        <link href="../../Resources/bootstrap/css/signin.css" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="../../Resources/css/style.css">
        <script src="../../Resources/swal/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../../Resources/swal/dist/sweetalert.css">        
        <script src="js/AlteracaoSenhaView.js"></script>

        <meta http-equiv="Content-Type" content="text/html; charset=utf8">
    </head>
    <body>
        <div id="CadastroForm">
            <div id="windowHeader" style="visibility: hidden;">
            </div>
            <div style="overflow: hidden;" id="windowContent">
                <form name="CadastroForm" method="post" accept-charset="UTF-8" action="Controller/Login/LoginController.php">
                    <table align="center">
                        <tr>
                            <td align="center">
                                <img src="../../Resources/images/cadeado.png" width="100" height="100"/>
                            </td>
                        </tr>
                        <tr>
                            <td align="center">
                                <label for="txtSenhaAtual">Senha Atual</label><br>
                                <input type="password" id="txtSenhaAtual" style="font-size: 18px;">
                            </td>
                        </tr>
                        <tr>
                            <td><br><br></td>
                        </tr>
                        <tr>
                            <td>
                                <label for="txtSenhaNova">Nova Senha</label><br>
                                <input type="password" id="txtSenhaNova" style="font-size: 18px;">
                            </td>
                        </tr>
                        <tr>
                            <td><br><br></td>
                        </tr>
                        <tr>
                            <td>
                                <label for="txtSenhaConfirmacao">Confirmação Nova Senha</label><br>
                                <input type="password" id="txtSenhaConfirmacao" style="font-size: 18px;">
                            </td>
                        </tr>
                        <tr>
                            <td><br></td>
                        </tr>
                        <tr>
                            <td align="center">
                            <button type="button" class="btn btn-primary" id="btnLogin">
                                <!-- <img src="../../Resources/images/btnLogin.jpg" width="100" height="100"/> -->
                                Enviar
                            </button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </body>
</html>

