<script src="../../View/Menu/js/CadMenuView.js?rdm=<?php echo time(); ?>"></script>
<div class="modal fade bd-example-modal-lg" id="cadastroMenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cadastroMenuTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="color-white" aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="codMenu">
        <div class="container">
          <div class="row">
              <div class="form-group col-10">
                  <label for="dscMenu" class="mb-0">Descrição</label>
                  <input type="text" id="dscMenu" name="dscMenu" class='persist input form-control'>
              </div>
          </div>
          <div class="row">
              <div class="form-group col-12">
                <label for="controller" class="mb-0">Controller</label>
                <div class="btn-group col-12 pl-0" id="controller">
                  <input type="text" id="nmeController" name="nmeController" class='persist input form-control'>
                  <input type="button" id="btnController" value="Listar Controllers" class="btn btn-secondary" >
                </div>
              </div>
          </div>
          <div class="row">
              <div class="form-group col-12">
                  <label for="method" class="mb-0">Método</label>
                <div class="btn-group col-12 pl-0" id="method">
                  <input type="text" id="nmeMethod" name="nmeMethod" class='persist input form-control'>
                  <input type="button" id="btnMetodo" value="Listar Métodos" class="btn btn-secondary" >
                </div>
              </div>
          </div>
          <div class="row">
              <div class="form-group col-6">
                  <label for="codMenuPai" class="mb-0">Menu pai</label>
                  <div id="divCodMenuPai"></div>
              </div>
          </div>
          <div class="row col-12">
              <div class="col-4 custom-control custom-checkbox">
                  <input type="checkbox" name="indVisible" id="indVisible" class="custom-control-input" />
                  <label class="custom-control-label" for="indVisible">Visível</label>
              </div>
              <div class="col-4 custom-control custom-checkbox">
                  <input type="checkbox" name="indAtivo" id="indAtivo" class="custom-control-input" />
                  <label class="custom-control-label" for="indAtivo">Ativo</label>
              </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-success" id="btnSalvarMenu">Salvar</button>
      </div>
    </div>
  </div>
</div>

  <div class="modal fade mt-3" id="modalControllers" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Controllers</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span class="color-white" aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="conteudoController">
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade mt-5" id="modalMetodos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Métodos</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span class="color-white" aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="conteudoMetodos">
        </div>
      </div>
    </div>
  </div>