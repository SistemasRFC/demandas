<script src="../../View/Demandas/js/CadArquivoView.js?rdm=<?php echo time(); ?>"></script>

<div class="modal fade bd-modal-lg" id="ArquivosDemanda" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document" style="box-shadow: 0 4px 8px 0 rgba(0 0 0 / 30%);">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Arquivos</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span class="color-white" aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body modal-lg">
                <form name="ArquivoForm" enctype="multpart/form-data" id="cadArquivoForm">
                    <input type="hidden" id="codArquivo">
                    <input type="hidden" id="dscCaminhoArquivo" name="dscCaminhoArquivo">

                    <div class="container" id="tdCadArquivo">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="dscArquivo">Descrição</label>
                                <textarea class="form-control" id="dscArquivo" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label for="arquivoScript">Arquivo</label>
                            <br />
                            <input type="file" name="arquivo" id="arquivoScript" size="45" />
                            <br />
                            <progress value="0" max="100"></progress>
                            <span id="porcentagem">0%</span>
                        </div>
                    </div>
                </form>
                <div class="container">
                    <div class="row">
                        <div id="tabelaArquivo" class="table-responsive"></div>
                    </div>
                </div>
			</div>
			<div class="modal-footer btn-group">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-success" id="btnSalvarArquivo">Salvar</button>
			</div>
		</div>
	</div>
</div>
