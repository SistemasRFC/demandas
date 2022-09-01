<!-- DataTables -->
<script src="../../View/Demandas/js/CadDescricaoView.js?rdm=<?php echo time(); ?>"></script>
<input type="hidden" id="codDescricao">
<div class="container" id="tdCadDescricao">
    <div class="row">
        <div class="col-8">
            <b>Descrição</b>
        </div>
        <div class="col-4">
            <b>Tipo</b>
        </div>
        <div class="w-100"></div>
        <div class="col-8">
            <div class="form-group">
                <textarea class="form-control" id="txtDescricao" rows="3"></textarea>
            </div>
        </div>
        <div class="col-4">
            <select id="tpoDescricao" class="btn btn-outline-secondary dropdown-toggle">
                <option value="" disabled selected hidden>Selecione uma opção</option>
                <option value="R">Requisito</option>
                <option value="O">Observação</option>
                <option value="S">Script</option>
            </select>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div id="tabelaDescricao" class="table-responsive"></div>
    </div>
</div>
