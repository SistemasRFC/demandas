var dadosDsc;
$(function() {
    $("#btnSalvarDemanda").click(function(){
        if($("#codDemanda").val() === ''){
            inserirDemanda();
        }else{
            updateDemanda();
        }
    });
    
    $("#btnInformacao").click(function() {
        $("#codDescricao").val(0);
        $("#txtDescricao").val('');
        $("#tpoDescricao").val('');
        $("#txtDescricao").prop('disabled', false);
        $("#tpoDescricao").prop('disabled', false);
        $("#formInformacao").show();
        $("#btnCancelarDescricao").show();
        $("#btnSalvarDescricao").show();
        $(this).hide();
    });
    
    $("#btnCancelarDescricao").click(() => {
        $("#formInformacao").hide();
        $("#btnCancelarDescricao").hide();
        $("#btnSalvarDescricao").hide();
        $("#btnInformacao").show();
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
        var grid = '<table id="tbAccordionDscEdit" class="table table-striped mb-0" width="100%">';
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
        criarDataTableBasic("tbAccordionDscEdit", 25);
    } 
}

function visualizarDescricaoEdit(indice) {
    console.log('visualizarDescricaoEdit', dadosDsc[indice]);
    $("#codDescricao").val(dadosDsc[indice].COD_DESCRICAO);
    $("#txtDescricao").val(dadosDsc[indice].TXT_DESCRICAO_TOTAL);
    $("#tpoDescricao").val(dadosDsc[indice].TPO_DESCRICAO.substring(0,1));
    $("#txtDescricao").prop('disabled', true);
    $("#tpoDescricao").prop('disabled', true);
    $("#formInformacao").show();
    $("#btnSalvarDescricao").hide();
    $("#btnCancelarDescricao").show();
    $("#btnInformacao").show();
}

function excluirDescricaoEdit(codDescricao) {
    ExecutaDispatch('DescricaoDemandas', 'DeleteDescricaoDemandas', 'codDescricao;'+codDescricao, carregaDscDemandaEdit);
}

function inserirDemanda(){
    var codResp = $("#codResponsavel").val() == -1?'':$("#codResponsavel").val();
    swal({
        title: "Aguarde, salvando registro!",
        imageUrl: "../../Resources/images/preload.gif",
        showConfirmButton: false
    });
    parametros = 'dscDemanda;'+$("#dscDemanda").val()+'|codSistema;'+$("#codSistema").val()+'|codSistemaOrigem;'+"1"+'|codResponsavel;'+codResp;
    parametros += '|codSituacao;'+$("#codSituacao").val()+'|indPrioridade;'+$("#comboPrioridade").val()+'|tpoDemanda;'+$("#comboTipoDemanda").val();
    ExecutaDispatch('Demandas', 'InsertDemandas', parametros, retornoInsertDemandas);
}

function retornoInsertDemandas(retorno){
    if (retorno[0]){
        $("#codDemanda").val(retorno[2]);
        $("#accordionEdit").show();
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
    var codResp = $("#codResponsavel").val() == -1?'':$("#codResponsavel").val();
    swal({
        title: "Aguarde, salvando registro!",
        imageUrl: "../../Resources/images/preload.gif",
        showConfirmButton: false
    });
    parametros = 'codDemanda;'+$("#codDemanda").val()+'|dscDemanda;'+$("#dscDemanda").val()+'|codSistema;'+$("#codSistema").val();
    parametros += '|codSistemaOrigem;'+"1"+'|codResponsavel;'+codResp+'|codSituacao;'+$("#codSituacao").val();
    parametros += '|codSituacaoAnterior;'+$("#codSituacaoAnterior").val()+'|indPrioridade;'+$("#comboPrioridade").val()+'|tpoDemanda;'+$("#comboTipoDemanda").val();
    ExecutaDispatch('Demandas', 'UpdateDemandas', parametros, retornoUpdateDemandas);
}

function listaComboSistemas(){
    ExecutaDispatch('Sistemas', 'ListarSistemasAtivosPorUsuario', undefined, montaComboSistemas);
}

function montaComboSistemas(dados) {
    CriarSelect('codSistema', dados, codSistemaDmd!=undefined?codSistemaDmd:-1, false);
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

function listaComboResponsaveis(){
    ExecutaDispatch('Usuario', 'ListarUsuariosPorPerfil', 'codPerfil;2|semResp;N', montaComboResponsaveis);
}

function montaComboResponsaveis(dados) {
    CriarSelect('codResponsavel', dados, codResponsavelDmd!=undefined?codResponsavelDmd:-1, false);
}