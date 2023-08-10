<script src="../../View/Demandas/js/CadDemandasView.js?rdm=<?php echo time(); ?>"></script>
<script src="../../View/Demandas/js/CadDescricaoView.js?rdm=<?php echo time(); ?>"></script>

<div class="modal fade" id="updateDemanda" role="dialog" aria-labelledby="modalCadastroDemanda" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document" style="max-width: 1000px;">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="updateDemandaTitle"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span class="color-white" aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="hidden" id="codDemanda" value="0">
                <div class="container">
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="dscDemanda" class="mb-0">Demanda</label>
                            <input type="text" id="dscDemanda" name="dscDemanda" class='form-control' maxlength='50'>
                            <small>* Limite de 50 caracteres.</small>
                        </div>
                        <div class="form-group col-6">
                            <label for="comboTipoDemanda" class="mb-0">Tipo</label>
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
                            <label class="mb-0">Sistema</label>
                            <div id="tdcodSistema"></div>
                        </div>
                        <div class="form-group col-6">
                            <label class="mb-0">Responsável</label>
                            <div id="tdcodResponsavel"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label class="mb-0">Status</label>
                            <div id="tdcodSituacao"></div>
                        </div>
                        <div class="form-group col-6">
                            <label for="comboPrioridade" class="mb-0">Prioridade</label>
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
                <div id="accordionEdit" style="width: 100% !important;min-height:fit-content;" class="sidebar">
                    <div class="nav-item">
                        <a href="" class="mb-0 h5 nav-link collapsed p-0" style="width: 100% !important;border-bottom: 1px solid;" id="btnDscEdit" data-toggle="collapse" data-target="#descricaoEdit" aria-expanded="true" aria-controls="collapseOne">
                            <strong>Mais informações</strong>
                        </a>

                        <div id="descricaoEdit" class="collapse m-0" style="border: 1px solid #780a0a;" aria-labelledby="informationOne" data-parent="#accordionEdit">
                            <div class="collapse-inner">
                                <div class="collapse-item m-0" style="background-color: #fff !important;">
                                    <div id="accordionDscEdit"></div>

                                    <hr>

                                    <input type="hidden" id="codDescricao">
                                    <div id="formInformacao" class="row">
                                        <div class="col-8">
                                            <label for="txtDescricao" class="mb-0">Descrição</label>
                                            <textarea class="form-control" id="txtDescricao" rows="3"></textarea>
                                        </div>
                                        <div class="col-4">
                                            <label for="tpoDescricao" class="mb-0">Tipo</label>
                                            <select id="tpoDescricao" class="form-control">
                                                <option value="" disabled selected hidden>Selecione...</option>
                                                <option value="R">Requisito</option>
                                                <option value="O">Observação</option>
                                                <option value="S">Script</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-12 btn-group">
                                            <button type="button" class="btn btn-secondary" id="btnCancelarDescricao">Cancelar</button>
                                            <button class="btn btn-warning" id="btnInformacao"><i class="fas fa-plus"></i> Incluir Informação</button>
                                            <button type="button" class="btn btn-primary" id="btnSalvarDescricao">Incluir</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
			<div class="modal-footer justify-content-center">
                <div class="col-5">
                    <!-- <button class="btn btn-info" id="btnHistorico" data-toggle="modal" data-target="#historicoDemanda">Histórico</button> -->
                    <!-- <button class="btn btn-warning" id="btnArquivos">Arquivos</button> -->
                    <button class="btn btn-success btn-block" id="btnSalvarDemanda">Salvar</button>
                </div>
			</div>
		</div>
	</div>
</div>
<?php include_once "HistoricoDemandaView.php"; ?>
<?php // include_once "CadArquivoView.php"; ?>