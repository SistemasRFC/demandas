<script src="../../View/Demandas/js/CadArquivoView.js?rdm=<?php echo time(); ?>"></script>
<form name="ArquivoForm" enctype="multpart/form-data" id="cadArquivoForm">
<input type="hidden" id="codArquivo">
<input type="hidden" id="dscCaminhoArquivo" name="dscCaminhoArquivo">

<div class="container" id="tdCadArquivo">
    <div class="row">
        <div class="col-8">
            <b>Descrição</b>
        </div>
        <div class="w-100"></div>
        <div class="col-8">
            <div class="form-group">
                <textarea class="form-control" id="dscArquivo" rows="3"></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-5">
            <b>Arquivo</b>
        </div>
        <div class="w-100"></div>
        <div class="col-5">
            Selecione o arquivo:<br>
                <input type="file" name="arquivo" id="arquivoScript" size="45" />
                <br />
                <progress value="0" max="100"></progress>
                <span id="porcentagem">0%</span>
                <br />
        </div>
    </div>
</div>
</form>
<div class="container">
    <div class="row">
        <div id="tabelaArquivo" class="table-responsive"></div>
    </div>
</div>
