
<html>
    <head>
        <title>Demandas - MontaFile</title>
        <?php include "../../Resources/imports-html.php"; ?>
        <script src="../../View/MontaFile/JavaScript/MontaFileView.js?rdm=<?php echo time(); ?>"></script>        
    </head>
    <body>
        <div id="wrapper">
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    <?php include_once "../../View/MenuPrincipal/Cabecalho.php"; ?>
                    <input type="hidden" id="method">
                    <input type="hidden" id="codUsuario">

                    <div class="container-fluid">
                        <div class="d-sm-flex align-items-center justify-content-between">
                            <h1 class="h3 mb-0 text-gray-800">Restrito - <small>Gerar Arquivos</small></h1>
                        </div>

                        <div class="row">
                            <div class="col-xl-12 col-md-12 mx-0 px-0">
                                <div class="card h-100">
                                    <div class="card-header d-flex align-items-end">
                                        <button id="btnAtualizar" class="btn btn-primary d-lg-inline">Atualizar</button>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div id="listaTabelas"></div>
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
