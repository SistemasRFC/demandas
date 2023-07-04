<script src="../../View/Demandas/js/CadDemandasView.js?rdm=<?php echo time(); ?>"></script>

<div class="modal fade" id="updateDemanda" role="dialog" aria-labelledby="modalCadastroDemanda" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="updateDemandaTitle"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span class="color-white" aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="hidden" id="codDemanda">
                <div class="container">
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="dscDemanda" class="mb-0">Demanda</label>
                            <input type="text" id="dscDemanda" name="dscDemanda" class='form-control' maxlength='50'>
                            <small>* Limite de 50 caracteres.</small>
                        </div>
                        <div class="form-group col-6">
                            <label for="nroCelular" class="mb-0">Tipo</label>
                            <select id="comboTipoDemanda" class="form-control dropdown-toggle">
                                <option value="" disabled selected>Selecione</option>
                                <option value="1"> Incidente </option>
                                <option value="2"> Corretiva </option>
                                <option value="3"> Evolutiva </option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="comboSistema" class="mb-0">Sistema</label>
                            <div id="divComboSistema"></div>
                        </div>
                        <div class="form-group col-6">
                            <label for="comboResponsaveis" class="mb-0">Responsável</label>
                            <div id="divComboResponsaveis"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="comboSituacao" class="mb-0">Status</label>
                            <div id="divComboSituacao"></div>
                        </div>
                        <div class="form-group col-6">
                            <label for="codPrioridade" class="mb-0">Prioridade</label>
                            <select id="comboPrioridade" class="form-control dropdown-toggle">
                                <option value="" disabled selected>Selecione</option>
                                <option value="1"> Baixa </option>
                                <option value="2"> Normal </option>
                                <option value="3"> Alta </option>
                                <option value="4"> Crítica </option>
                            </select>
                        </div>
                    </div>
                </div>
                <div id="accordionEdit">
                    <div class="btn btn-block accordion-header bg-color-primary" id="topDescricaoEdit">
                        <i class="ml-auto fa-solid fa-angle-right"></i>
                        <span id="btnDscEdit" class="mb-0 h5" data-toggle="collapse" data-target="#descricaoEdit" aria-expanded="true" aria-controls="collapseOne">
                            Mais Informações
                        </span>
                        <i class="ml-auto fa-solid fa-angle-left"></i>
                    </div>

                    <div id="descricaoEdit" class="collapse accordion-body" aria-labelledby="topDescricaoEdit" data-parent="#accordionEdit">
                        <div class="row">
                            <div id="accordionDscEdit" class="table"></div>
                        </div>
                    </div>
                </div>
			</div>
			<div class="modal-footer btn-group">
				<button class="btn btn-info" id="btnHistorico">Histórico</button>
				<!-- <button class="btn btn-warning" id="btnArquivos">Arquivos</button> -->
				<button class="btn btn-primary" id="btnInformacao">Incluir Informação</button>
				<button class="btn btn-success" id="btnSalvarDemanda">Salvar</button>
			</div>
		</div>
	</div>
</div>
<?php include_once "CadDescricaoView.php"; ?>
<?php include_once "HistoricoDemandaView.php"; ?>
<?php // include_once "CadArquivoView.php"; ?>