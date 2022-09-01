<html>

<head>
	<title>Demandas - Cadatro demanda</title>
	<?php include "../../Resources/imports-html.php"; ?>
	<script src="../../View/Demandas/js/DemandasView.js?rdm=<?php echo time(); ?>"></script>
</head>

<body>
	<div id="wrapper">
		<div id="content-wrapper" class="d-flex flex-column">
			<div id="content">
				<?php include "../../View/MenuPrincipal/Cabecalho.php"; ?>
				<input type="hidden" id="codDemanda">
				<input type="hidden" id="codSituacaoAnterior">
				<input type="hidden" id="codSituacao" value="<?php echo isset($_POST['codSituacao']) ? $_POST['codSituacao'] : ''; ?>">
				<input type="hidden" id="codSistemaOrigem">

				<div class="container-fluid">
					<div class="d-sm-flex align-items-center justify-content-between">
						<h1 class="h3 mb-0 text-gray-800">Demandas</h1>
					</div>

					<div class="row">
						<div class="col-xl-12 col-md-12 mx-0 px-0">
							<div class="card h-100">
								<div class="card-header d-flex align-items-end">
									<button id="btnNovaDemanda" class="btn btn-primary d-lg-inline">Nova Demanda</button>
									<div class="row ml-auto" id="divComboTpoDemanda"></div>
								</div>
								<div class="card-body">
									<div class="container">
										<div class="row">
											<div id="tabelaDemandas" class="table-responsive"></div>
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
</body>

</html>
<div class="modal fade bd-example-modal-lg" id="updateDemanda" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Editar Demanda</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span class="color-white" aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?php include_once "CadDemandasView.php"; ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-info" id="btnHistorico">Histórico</button>
				<button type="button" class="btn btn-info" id="btnDescricao">Inserir Descrição</button>
				<button type="button" class="btn btn-info" id="btnArquivos">Arquivos</button>
				<button type="button" class="btn btn-primary" id="btnSalvarDemanda">Salvar</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade bd-modal-lg" id="descricaoDemanda" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Descrição da Demanda</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body modal-lg">
				<?php include_once "CadDescricaoView.php"; ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-primary" id="btnSalvarDescricao">Salvar</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade bd-modal-lg" id="historicoDemanda" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Histórico da Demanda</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body modal-lg">
				<div class="container">
					<div class="row">
						<div id="tabelaHistorico" class="table-responsive"></div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade bd-modal-lg" id="textoDescricao" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Descrição</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body modal-lg">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<div class="form-group">
								<textarea class="form-control" id="txtDescricaoTotal" rows="5"></textarea>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade bd-modal-lg" id="ArquivosDemanda" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Arquivos</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body modal-lg">
				<?php include_once "CadArquivoView.php"; ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-primary" id="btnSalvarArquivo">Salvar</button>
			</div>
		</div>
	</div>
</div>