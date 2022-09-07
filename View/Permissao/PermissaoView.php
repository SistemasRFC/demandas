<html>
    <head>
        <title>Demandas - Permissões</title>
        <?php include "../../Resources/imports-html.php"; ?>
        <script src="../../View/Permissao/js/PermissaoView.js?rdm=<?php echo time(); ?>"></script>
    </head>
    <body>
        <div id="wrapper">
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    <?php include "../../View/MenuPrincipal/Cabecalho.php"; ?>

                    <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <h1 class="h3 mb-0 text-gray-800">Restrito - <small>Permissão</small></h1>
                    </div>

                    <div class="row">
                        <div class="col-xl-12 col-md-12 mx-0 px-0">
                        <div class="card h-100">
                            <div class="card-header d-flex align-items-end">
                                <div class="row">
                                    <div class="col-sm-8" id="tdCodPerfil"></div>
                                    <div class="col-sm-4">
                                        <button id="btnPesquisar" class="btn btn-primary d-lg-inline">Carregar lista</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row mb-1">
                                    <button class="btn btn-success btn-block d-lg-inline btnSalvarPermissao">Atualizar Permissões</button>
                                </div>
                                <div class="row">
                                    <div id="ListaPermissaos"></div>
                                </div>
                                <div class="row">
                                    <button class="btn btn-success btn-block d-lg-inline btnSalvarPermissao">Atualizar Permissões</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<!-- 
        <?php //include "../../View/MenuPrincipal/Cabecalho.php"; ?>        
        <table align="center" width="100%">
            <tr>
                <td>
                    <table width="30%" border="0" align="left">
                        <tr>
                            <td class="style3">Perfil</td>
                            <td class="styleTD1" id="tdCodPerfil">
                            </td>
                            <td><input type="button" class="btn-sm btn-primary" value="Carregar Lista" id="btnPesquisar"></td>
                        </tr>
                    </table>
                </td>
            </tr>            
            <tr>
                <td>
                    <br>
                    <input type="button" class="btnSalvarPermissao btn-sm btn-primary" value="Salvar Permissões">
                    <br>
                </td>
            </tr>
            <tr>
                <td align="left">
                    <span style="font-size: 20px; color: black;">Lista de Permissões do Sistema</span>
                </td>
            </tr>
            <tr>
                <td id="tdListaPermissaos" align="left">
                    <div id="ListaPermissaos" style="overflow: auto; width: 50%"></div>
                </td>
            </tr>
            <tr>
                <td>
                    <br>
                    <input type="button" class="btnSalvarPermissao btn-sm btn-primary" value="Salvar Permissões">
                    <br>
                </td>
            </tr>            
        </table> -->
    </body>
</html>

