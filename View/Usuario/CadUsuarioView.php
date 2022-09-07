<script src="../../View/Usuario/js/CadUsuarioView.js?rdm=<?php echo time(); ?>"></script>

<div class="modal fade" id="cadUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Cadastro do Usuário</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="color-white" aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="codUsuario">
                <div class="container">
                    <div class="row">
                        <div class="form-group col-8">
                            <label for="nmeUsuario" class="mb-0">Nome Completo</label>
                            <input type="text" id="nmeUsuario" name="nmeUsuario" class='persist input form-control'>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="txtEmail" class="mb-0">E-mail</label>
                            <input type="text" id="txtEmail" name="txtEmail" class='persist input form-control'>
                        </div>
                        <div class="form-group col-6">
                            <label for="nroCelular" class="mb-0">Celular</label>
                            <input type="text" id="nroCelular" name="nroCelular" class='persist input form-control'>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="txtLogin" class="mb-0">Login</label>
                            <input type="text" id="txtLogin" name="txtLogin" class='persist input form-control'>
                        </div>
                        <div class="form-group col-6">
                            <label for="comboPerfil" class="mb-0">Perfil</label>
                            <div id="divComboPerfil"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="comboSistema" class="mb-0">Sistemas</label>
                            <div id="divComboSistemas"></div>
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
            <div class="modal-footer btn-group">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-info" id="btnReiniciaSenha">Reiniciar Senha</button>
                <button type="button" class="btn btn-success" id="btnSalvarUsuario">Salvar</button>
            </div>
        </div>
    </div>
</div>