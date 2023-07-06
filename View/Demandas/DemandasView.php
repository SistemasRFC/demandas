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
									<div id="tabelaDemandas"></div>
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
<?php include_once "CadDemandasView.php"; ?>
<?php include_once "VisuDemandasView.php"; ?>