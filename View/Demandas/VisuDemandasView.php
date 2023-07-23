<script src="../../View/Demandas/js/VisuDemandasView.js?rdm=<?php echo time(); ?>"></script>

<div class="modal fade" id="visuDemanda" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document" style="max-width: 900px;">
		<div class="modal-content">
			<div class="modal-header d-flex align-items-center">
				<h5 class="modal-title" id="visuDemandaTitle"></h5></span>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span class="color-white" aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-9 border-right">
                            <h5><b>Título</b></h5>
                            <p class="dscDemanda"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2 description-block border-right">
                            <h5><b>Tipo</b></h5>
                            <span class="tipoDemanda"></span>
                        </div>
                        <div class="col-3 description-block border-right">
                            <h5><b>Sistema</b></h5>
                            <span class="dscSistema"></span>
                        </div>
                        <div class="col-4 description-block border-right">
                            <h5><b>Responsável</b></h5>
                            <span class="responsavel"></span>
                        </div>
                        <div class="col-3 description-block">
                            <h5><b>Prioridade</b></h5>
                            <span class="dscPrioridade"></span>
                        </div>
                    </div>
                </div>
                <div id="accordion" style="width: 100% !important;min-height:fit-content;" class="sidebar">
                    <div class="nav-item">
                        <a href="" class="mb-0 h5 nav-link collapsed p-0" style="width: 100% !important;border-bottom: 1px solid;" id="btnDsc" data-toggle="collapse" data-target="#descricao" aria-expanded="true" aria-controls="collapseOne">
                            <strong>Mais informações</strong>
                        </a>

                        <div id="descricao" class="collapse m-0" style="border: 1px solid #780a0a;" aria-labelledby="informationOne" data-parent="#accordion">
                            <div class="collapse-inner">
                                <div class="collapse-item" style="background-color: #fff !important;">
                                    <div id="accordionDsc"></div>

                                    <hr>

                                    <!-- <input type="hidden" id="codDescricaoV"> -->
                                    <div id="formInformacaoVisu" class="row">
                                        <div class="col-8">
                                            <label for="txtDescricaoV" class="mb-0">Descrição</label>
                                            <textarea class="form-control" id="txtDescricaoV" rows="3"></textarea>
                                        </div>
                                        <div class="col-4">
                                            <label for="tpoDescricaoV" class="mb-0">Tipo</label>
                                            <select id="tpoDescricaoV" class="form-control">
                                                <option value="" disabled selected hidden>Selecione...</option>
                                                <option value="R">Requisito</option>
                                                <option value="O">Observação</option>
                                                <option value="S">Script</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-12 btn-group">
                                            <button type="button" class="btn btn-secondary" id="btnCancelarDescricaoVisu">Cancelar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</div>
</div>