$(function() {
    $("#btnSalvarDemanda").click(function(){
        if($("#codDemanda").val() === ''){
            inserirDemanda();
        }else{
            updateDemanda();
        }
    });
    
    $("#btnDescricao").click(function(){
        carregaGridDescricao();
        $("#descricaoDemanda").modal("show");
    });
    
    $("#btnArquivos").click(function(){
        carregaGridArquivo();
        $("#ArquivosDemanda").modal("show");
    });
    
    $("#btnHistorico").click(function(){
        if ($("#codDemanda").val()!= '' ){
            carregaGridHistorico($("#codDemanda").val());
        }else{            
            $(".jquery-waiting-base-container").fadeOut({modo:"fast"});
        swal({
            title: "Erro!",
            text: "Selecione uma Demanda!",
            type: "info",
            confirmButtonText: "Fechar"
        });
        }
    });
});

function inserirDemanda(){
    swal({
        title: "Aguarde, salvando registro!",
        imageUrl: "../../Resources/images/preload.gif",
        showConfirmButton: false
    });
    parametros = 'dscDemanda;'+$("#dscDemanda").val()+'|codSistema;'+$("#comboSistema").val()+'|codSistemaOrigem;'+"1"+'|codResponsaveis;'+$("#comboResponsaveis").val();
    parametros += '|codSituacao;'+$("#comboSituacao").val()+'|indPrioridade;'+$("#comboPrioridade").val()+'|tpoDemanda;'+$("#comboTipoDemanda").val();
    ExecutaDispatch('Demandas', 'InsertDemandas', parametros, retornoInsertDemandas);
}

function retornoInsertDemandas(retorno){
    if (retorno[0]){
        $("#codDemanda").val(retorno[2]);
        $("#comboTpoDemanda").val($("#comboTipoDemanda").val());
        carregaGridDemandas();
        carregaGridDescricao();
        swal({
            title: "Sucesso!",
            text: "Registro salvo com sucesso!",
            type: "success",
            confirmButtonText: "Fechar"
        });
        $("#updateDemanda").modal("hide");
    }else{
        $(".jquery-waiting-base-container").fadeOut({modo:"fast"});
        swal({
            title: "Erro!",
            text: retorno[1],
            type: "error",
            confirmButtonText: "Fechar"
        });
    }
}

function carregaCamposDemanda(indice){
//    console.log(dadosListagem[indice].COD_DEMANDA);
    $("#codDemanda").val(dadosListagem[indice].COD_DEMANDA);
    $("#dscDemanda").val(dadosListagem[indice].DSC_DEMANDA);
    $("#dtaDemanda").val(dadosListagem[indice].DTA_DEMANDA);
    $("#comboResponsaveis").val(dadosListagem[indice].COD_RESPONSAVEIS);
    $("#comboSistema").val(dadosListagem[indice].COD_SISTEMA);
    $("#codSistemaOrigem").val(dadosListagem[indice].COD_SISTEMA_ORIGEM);
    $("#comboSituacao").val(dadosListagem[indice].COD_SITUACAO);
    $("#comboPrioridade").val(dadosListagem[indice].IND_PRIORIDADE);
    $("#comboTipoDemanda").val(dadosListagem[indice].TPO_DEMANDA);
    $("#codSituacaoAnterior").val(dadosListagem[indice].COD_SITUACAO);
    $("#updateDemanda").modal('show');
}

function updateDemanda(){
    swal({
        title: "Aguarde, salvando registro!",
        imageUrl: "../../Resources/images/preload.gif",
        showConfirmButton: false
    });
    parametros = 'codDemanda;'+$("#codDemanda").val()+'|dscDemanda;'+$("#dscDemanda").val()+'|codSistema;'+$("#comboSistema").val();
    parametros += '|codSistemaOrigem;'+"1"+'|codResponsaveis;'+$("#comboResponsaveis").val()+'|codSituacao;'+$("#comboSituacao").val();
    parametros += '|codSituacaoAnterior;'+$("#codSituacaoAnterior").val()+'|indPrioridade;'+$("#comboPrioridade").val()+'|tpoDemanda;'+$("#comboTipoDemanda").val();
    ExecutaDispatch('Demandas', 'UpdateDemandas', parametros, retornoUpdateDemandas);
}

function retornoUpdateDemandas(retorno){
    if (retorno[0]){
        $("#codSituacaoAnterior").val($("#comboSituacao").val());
        carregaGridDemandas();
        swal({
            title: "Sucesso!",
            text: "Registro salvo com sucesso!",
            type: "success",
            confirmButtonText: "Fechar"
        });
    }else{
        $(".jquery-waiting-base-container").fadeOut({modo:"fast"});
        swal({
            title: "Erro!",
            text: retorno[1],
            type: "error",
            confirmButtonText: "Fechar"
        });
    }
}

function listaComboSistemas(){
    ExecutaDispatch('Sistemas', 'ListarSistemasAtivosPorUsuario', undefined, montaComboSistemas);
}

function montaComboSistemas(dados){
    if(dados[0]){
        dados = dados[1];
         combo = '<select id="comboSistema" class="btn btn-outline-secondary dropdown-toggle" >';
         combo += '<option value="" disabled selected hidden>Selecione uma opção</option>';
        for (i=0;i<dados.length;i++){
            combo += '<option value="'+dados[i].COD_SISTEMA+'">'+dados[i].NME_SISTEMA+'</option>';
        }
         combo +='</select>';
         $("#divComboSistema").html(combo);
    }
}

function listaComboSituacao(){
    ExecutaDispatch('Situacao', 'ListarSituacao', undefined, montaComboSituacao);
}

function montaComboSituacao(dados){
    if(dados[0]){
        dados = dados[1];
         combo = '<select id="comboSituacao" class="btn btn-outline-secondary dropdown-toggle" >';
         combo += '<option value="" disabled selected hidden>Selecione uma opção</option>';
        for (i=0;i<dados.length;i++){
            combo += '<option value="'+dados[i].COD_SITUACAO+'">'+dados[i].DSC_SITUACAO+'</option>';
        }
         combo +='</select>';
         $("#divComboSituacao").html(combo);
    }
}

function listaComboResponsaveis(){
    ExecutaDispatch('Usuario', 'ListarUsuariosAtivos', undefined, montaComboResponsaveis);
}

function montaComboResponsaveis(dados){
    if(dados[0]){
        dados = dados[1];
         combo = '<select id="comboResponsaveis" class="btn btn-outline-secondary dropdown-toggle">';
         combo += '<option value="" disabled selected hidden>Selecione uma opção</option>';
        for (i=0;i<dados.length;i++){
            combo += '<option value="'+dados[i].COD_USUARIO+'">'+dados[i].NME_USUARIO_COMPLETO+'</option>';
        }
        combo +='</select>';
        $("#divComboResponsaveis").html(combo);
    }
}

$(document).ready(function() {
    listaComboSistemas();
    listaComboSituacao();
    listaComboResponsaveis();
} );