<script src="../../View/Situacao/js/CadSituacaoView.js?rdm=<?php echo time(); ?>"></script>

<div class="modal fade bd-example-modal-lg" id="cadSituacao" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cadSituacaoTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="color-white" aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="codSituacao" name="codSituacao" class='persist'>
                <div class="container">
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="dscSituacao" class="mb-0">Descrição</label>
                            <input type="text" id="dscSituacao" name="dscSituacao" class='persist input form-control'>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer btn-group">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-success" id="btnSalvarSituacao">Salvar</button>
            </div>
        </div>
    </div>
</div>