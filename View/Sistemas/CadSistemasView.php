<script src="../../View/Sistemas/js/CadSistemasView.js?rdm=<?php echo time(); ?>"></script>

<div class="modal fade bd-example-modal-lg" id="updateSistema" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateSistemaTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="color-white" aria-hidden="true">&times;</span>
                </button>
            </div>
        <div class="modal-body">
            <div class="container">
                <div class="row">
                    <div class="form-group col-6">
                        <label for="nmeSistema" class="mb-0">Nome do Sistema</label>
                        <input type="text" id="nmeSistema" name="nmeSistema" class='persist input form-control'>
                    </div>
                    <div class="form-group col-6">
                        <label for="nmeBanco" class="mb-0">Banco de Dados</label>
                        <input type="text" id="nmeBanco" name="nmeBanco" class='persist input form-control'>
                    </div>
                </div>
                <div class="row col-6">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="indAtivo" id="indAtivo" class="custom-control-input" />
                        <label class="custom-control-label" for="indAtivo">Ativo</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-success" id="btnSalvarSistema">Salvar</button>
        </div>
    </div>
</div>