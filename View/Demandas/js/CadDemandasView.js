var dadosDsc;
$(function() {
    $("#btnSalvarDemanda").click(function(){
        if($("#codDemanda").val() === ''){
            inserirDemanda();
        }else{
            updateDemanda();
        }
    });
    
    $("#btnInformacao").click(function(){
        $("#codDescricao").val(0);
        $("#txtDescricao").val('');
        $("#tpoDescricao").val('');
        $("#txtDescricao").prop('disabled', false);
        $("#tpoDescricao").prop('disabled', false);
        $("#accordionEdit").show();
        $("#btnSalvarDescricao").prop('hidden', false);
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

    $("#btnDscEdit").click(function() {
        carregaDscDemandaEdit();
    });
});

function carregaDscDemandaEdit(){
    ExecutaDispatch('DescricaoDemandas', 'ListarDescricaoDemandas', 'codDemanda;'+$("#codDemanda").val(), montaDescricaoEdit);
}

function montaDescricaoEdit(dados){
    if (dados[0]) {
        var grid = '<table id="tbAccordionDscEdit" class="table table-striped">';
        grid += '<thead><tr>';
        grid += ' <th><b>Descrição</b></th>';
        grid += ' <th><b>tipo</b></th>';
        grid += ' <th><b>Responsável</b></th>';
        grid += ' <th><b>Ações</b></th>';
        grid += '</tr></thead><tbody>';
        if (dados[1] !== null) {
            dados = dados[1];
            dadosDsc = dados;
            for (i = 0; i < dados.length; i++) {
                grid += '<tr>';
                grid += ' <td>' + dados[i].TXT_DESCRICAO + '</td>';
                grid += ' <td>' + dados[i].TPO_DESCRICAO + '</td>';
                grid += ' <td>' + dados[i].NME_USUARIO + '</td>';
                grid += ' <td>';
                grid += '   <button class="btn btn-link" title="Visualizar" onClick="javascript:visualizarDescricaoEdit(\''+i+'\');">';
                grid += '       <i class="fa-regular fa-eye"></i>';
                grid += '   </button>';
                grid += '   <button class="btn btn-link" title="Excluir" onClick="javascript:excluirDescricaoEdit('+dados[i].COD_DESCRICAO+');">';
                grid += '       <i class="fa-solid fa-trash"></i>';
                grid += '   </button>';
                grid += ' </td>';
                grid += '</tr>';
            }
        }
        grid += '</tbody>';
        grid += '</table>';
        $("#accordionDscEdit").html(grid);
        criarDataTableBasic("tbAccordionDscEdit");
    } 
}

function visualizarDescricaoEdit(indice) {
    $("#codDescricao").val(dadosDsc[indice].COD_DESCRICAO);
    $("#txtDescricao").val(dadosDsc[indice].TXT_DESCRICAO_TOTAL);
    $("#tpoDescricao").val(dadosDsc[indice].TPO_DESCRICAO.substring(0,1));
    $("#txtDescricao").prop('disabled', true);
    $("#tpoDescricao").prop('disabled', true);
    $("#btnSalvarDescricao").prop('hidden', true);
    $("#descricaoDemanda").modal("show");
}

function excluirDescricaoEdit(codDescricao) {
    ExecutaDispatch('DescricaoDemandas', 'DeleteDescricaoDemandas', 'codDescricao;'+codDescricao, carregaDscDemandaEdit);
}

function inserirDemanda(){
    swal({
        title: "Aguarde, salvando registro!",
        imageUrl: "../../Resources/images/preload.gif",
        showConfirmButton: false
    });
    parametros = 'dscDemanda;'+$("#dscDemanda").val()+'|codSistema;'+$("#codSistema").val()+'|codSistemaOrigem;'+"1"+'|codResponsavel;'+$("#codResponsavel").val();
    parametros += '|codSituacao;'+$("#codSituacao").val()+'|indPrioridade;'+$("#comboPrioridade").val()+'|tpoDemanda;'+$("#comboTipoDemanda").val();
    ExecutaDispatch('Demandas', 'InsertDemandas', parametros, retornoInsertDemandas);
}

function retornoInsertDemandas(retorno){
    if (retorno[0]){
        $("#codDemanda").val(retorno[2]);
        $("#btnInformacao").attr('disabled', false);
        $("#btnInformacao").attr('title', 'Incluir informação');
        carregaGridDemandas();
        swal({
            title: "Sucesso!",
            text: "Registro salvo com sucesso!",
            type: "success",
            showConfirmButton: false,
            timer: 1500
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

function updateDemanda(){
    swal({
        title: "Aguarde, salvando registro!",
        imageUrl: "../../Resources/images/preload.gif",
        showConfirmButton: false
    });
    parametros = 'codDemanda;'+$("#codDemanda").val()+'|dscDemanda;'+$("#dscDemanda").val()+'|codSistema;'+$("#codSistema").val();
    parametros += '|codSistemaOrigem;'+"1"+'|codResponsavel;'+$("#codResponsavel").val()+'|codSituacao;'+$("#codSituacao").val();
    parametros += '|codSituacaoAnterior;'+$("#codSituacaoAnterior").val()+'|indPrioridade;'+$("#comboPrioridade").val()+'|tpoDemanda;'+$("#comboTipoDemanda").val();
    ExecutaDispatch('Demandas', 'UpdateDemandas', parametros, retornoUpdateDemandas);
}

function montaComboSistemas(dados) {
    CriarSelect('codSistema', dados, -1, false);
}

function listaComboSituacao(){
    ExecutaDispatch('Situacao', 'ListarSituacao', undefined, montaComboSituacao);
}

function montaComboSituacao(dados) {
    if($("#codDemanda").val() == '0' || $("#codDemanda").val() == '') {
        CriarSelect('codSituacao', dados, 1, true);
    } else {
        CriarSelect('codSituacao', dados, codSituacaoDmd, false);
    }
}

function montaComboResponsaveis(dados) {
    CriarSelect('codResponsavel', dados, -1, false);
}
