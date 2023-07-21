<script src="../../View/Demandas/js/CadDescricaoView.js?rdm=<?php echo time(); ?>"></script>

<div class="modal fade" id="descricaoDemanda" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: 1051 !important;">
	<div class="modal-dialog modal-lg" role="document" style="box-shadow: 0 4px 8px 0 rgba(0 0 0 / 30%);">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Descrição da Demanda</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span class="color-white" aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body modal-lg">
                <input type="hidden" id="codDescricao">
                <div class="container" id="tdCadDescricao">
                    <div class="row">
                        <div class="col-8">
                            <label for="txtDescricao">Descrição</label>
                            <textarea class="form-control" id="txtDescricao" rows="3"></textarea>
                        </div>
                        <div class="col-4">
                            <label for="tpoDescricao">Tipo</label>
                            <select id="tpoDescricao" class="btn btn-outline-secondary dropdown-toggle">
                                <option value="" disabled selected hidden>Selecione uma opção</option>
                                <option value="R">Requisito</option>
                                <option value="O">Observação</option>
                                <option value="S">Script</option>
                            </select>
                        </div>
                    </div>
                </div>
			</div>
			<div class="modal-footer btn-group">
				<!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-success" id="btnSalvarDescricao">Salvar</button> -->
			</div>
		</div>
	</div>
</div>
