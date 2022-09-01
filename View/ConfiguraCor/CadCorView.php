<script src="../../View/ConfiguraCor/js/CadCorView.js?rdm=<?php echo time(); ?>"></script>

<div class="modal fade bd-example-modal-lg" id="cadCorPeriodo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="cadCorPeriodoTitle"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span class="color-white" aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="container">
                <div class="row">
                    <div class="form-group col-6">
                        <label for="vlrTempoInicial" class="mb-0">Tempo Inicial</label>
                        <input type="text" id="vlrTempoInicial" name="vlrTempoInicial" class='persist input form-control'>
                    </div>
                    <div class="form-group col-6">
                        <label for="vlrTempoFinal" class="mb-0">Tempo Final</label>
                        <input type="text" id="vlrTempoFinal" name="vlrTempoFinal" class='persist input form-control'>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="dscCor" class="mb-0">Cor</label>
                        <input id="dscCor" type="text" class="persist input form-control" placeholder="#f0f0f0">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-primary" id="btnSalvarPeriodo">Salvar</button>
        </div>
    </div>
</div>