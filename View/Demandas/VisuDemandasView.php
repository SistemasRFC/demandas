<script src="../../View/Demandas/js/VisuDemandasView.js?rdm=<?php echo time(); ?>"></script>

<div class="modal fade" id="visuDemanda" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="visuDemandaTitle">Visualizar Demanda <span class="badge badge-light" id="status"></span></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span class="color-white" aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="hidden" class="codDemanda">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h5><b>Título</b></h5>
                            <p class="dscDemanda"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3 description-block border-right">
                            <h5><b>Tipo</b></h5>
                            <span class="tipoDemanda"></span>
                        </div>
                        <div class="col-3 description-block border-right">
                            <h5><b>Sistema</b></h5>
                            <span class="dscSistema"></span>
                        </div>
                        <div class="col-3 description-block border-right">
                            <h5><b>Responsável</b></h5>
                            <span class="responsavel"></span>
                        </div>
                        <div class="col-3 description-block">
                            <h5><b>Prioridade</b></h5>
                            <span class="dscPrioridade"></span>
                        </div>
                    </div>
                </div>
                <div id="accordion">
                    <div class="btn btn-block accordion-header color-primary" id="topDescricao">
                        <h5 id="btnDsc" class="mb-0" data-toggle="collapse" data-target="#descricao" aria-expanded="true" aria-controls="collapseOne">
                            <b>Mais Informações</b>
                        </h5>
                    </div>

                    <div id="descricao" class="collapse accordion-body" aria-labelledby="topDescricao" data-parent="#accordion">
                        <div class="row">
                            <div id="accordionDsc" class="table"></div>
                        </div>
                    </div>
                </div>
			</div>
			<div class="modal-footer" id="footer-visu">
				<button class="btn btn-primary" id="btnDescricao">Adicionar Informação</button>
			</div>
		</div>
	</div>
</div>
<?php include_once "CadDescricaoView.php"; ?>