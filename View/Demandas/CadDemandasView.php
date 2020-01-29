<script src="../../View/Demandas/js/CadDemandasView.js?rdm=<?php echo time(); ?>"></script>
<div class="container-fluid" id="tdCadDemandas">
    <div class="row">
        <div class="col">
            <b>Demanda</b>
        </div>
        <div class="col">
            <b>Tipo</b>
        </div>
        <div class="w-100"></div>
        <div class="col">
            <input type="text" class="form-control" id="dscDemanda" maxlength="50">
        </div>
        <div class="col">
            <select id="comboTipoDemanda" class="btn btn-outline-secondary dropdown-toggle">
                <option value="" disabled selected hidden>Selecione uma opção</option>
                <option value="1"> Incidente </option>
                <option value="2"> Corretiva </option>
                <option value="3"> Evolutiva </option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <b>Sistema Referido</b>
        </div>
        <div class="col">
            <b>Responsável</b>
        </div>
        <div class="w-100"></div>
        <div class="col">
            <div id="divComboSistema"></div>
        </div>
        <div class="col">
            <div id="divComboResponsaveis"></div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <b>Status</b>
        </div>
        <div class="col">
            <b>Prioridade</b>
        </div>
        <div class="w-100"></div>
        <div class="col">
            <div id="divComboSituacao"></div>
        </div>
        <div class="col">
            <select id="comboPrioridade" class="btn btn-outline-secondary dropdown-toggle">
                <option value="" disabled selected hidden>Selecione uma opção</option>
                <option value="1"> Baixa </option>
                <option value="2"> Normal </option>
                <option value="3"> Alta </option>
                <option value="4"> Crítica </option>
            </select>
        </div>
    </div>
</div>