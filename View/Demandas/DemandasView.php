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
				<input type="hidden" id="codSituacaoAnterior">
				<!-- <input type="hidden" id="codSituacao" value="<?php echo isset($_POST['codSituacao']) ? $_POST['codSituacao'] : ''; ?>"> -->
				<input type="hidden" id="codSistemaOrigem">

				<div class="row">
					<div class="col-xl-12 col-md-12 mx-0 px-0">
						<div class="card mt-0">
							<div class="card-body">
								<div class="row no-gutters align-items-center">
									<div class="col">
										<div class=" font-weight-bold text-secondary mb-1">Filtros:</div>
										<div class="row">
											<div class="col-2">
												<label class="mb-0">Situação: </label>
												<div id="tdcomboTpoDemanda"></div>
											</div>
											<div class="col-2">
												<label class="mb-0">Sistema: </label>
												<div id="tdcomboSistemas"></div>
											</div>
											<div class="col-2">
												<label class="mb-0">Responsável: </label>
												<div id="tdcomboResponsaveis"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-12 col-md-12 mx-0 px-0">
						<div class="card">
							<div class="card-header d-flex align-items-center">
								<h5 class="mb-0">Demandas</h5>
								<button id="btnNovaDemanda" class="btn btn-primary d-lg-inline ml-auto">Nova Demanda</button>
							</div>
							<div class="card-body">
								<div id="tabelaDemandas"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>
<?php include_once "CadDemandasView.php"; ?>
<?php include_once "VisuDemandasView.php"; ?>