var dadosListagem;
var codSituacaoDmd;
$(function() {
    $("#btnNovaDemanda").click(function() {
        listaComboSituacao();
        $("#codDemanda").val('');
        $("#dscDemanda").val('');
        $("#codSistemaOrigem").val('');
        $("#codSistema").val('');
        $("#codResponsavel").val('');
        $("#comboPrioridade").val('');
        $("#comboTipoDemanda").val('');
        $("#accordionEdit").hide();
        $("#btnInformacao").attr('disabled', true);
        $("#btnInformacao").attr('title', 'A Demanda ainda não foi criada!');
        $("#updateDemandaTitle").html("Incluir Demanda");
        $("#updateDemanda").modal("show");
    });
});

function carregaGridDemandas() {
    montaGridDemandas([true, []]);
    ExecutaDispatch('Demandas', 'ListarDemandas', 'comboTpoDemanda;'+$("#comboTpoDemanda").val()+'|comboSistemas;'+$("#comboSistemas").val()+'|comboResponsaveis;'+$("#comboResponsaveis").val(), montaGridDemandas);
}

function montaGridDemandas(dados){
    if(dados[0]){
        var grid = '<table id="tbDemandas" class="table table-striped" width="100%">';
        grid += '<thead><tr>';
        grid += ' <th width="8%"><b>Duração Execução</b></th>';
        grid += ' <th width="8%"><b>Duração Criada</b></th>';
        grid += ' <th width="6%"><b>Cod.</b></th>';
        grid += ' <th width="20%"><b>Demanda</b></th>';
        grid += ' <th width="10%"><b>Sistema</b></th>';
        grid += ' <th width="13%"><b>Reponsável</b></th>';
        grid += ' <th width="10%"><b>Tipo</b></th>';
        grid += ' <th width="10%"><b>Prioridade</b></th>';
        grid += ' <th width="10%"><b>Status</b></th>';
        grid += ' <th width="5%"><b>Ações</b></th>';
        grid += '</tr></thead><tbody>';
        if(dados[1] !== null){
            dadosListagem = dados[1];
            dados = dados[1];
            for (i=0;i<dados.length;i++){
                grid += '<tr>';
                grid += ' <td style="background-color:'+dados[i].DSC_COR+'">'+dados[i].DIAS_DECORRIDAS+' Dia(s)<br>'+dados[i].HORAS_DECORRIDAS+' Hr(s)</td>';
                grid += ' <td style="background-color:'+dados[i].DSC_COR+'">'+dados[i].DIAS_CRIADO+' Dia(s)<br>'+dados[i].HORAS_CRIADO+' Hr(s)</td>';
                grid += ' <td>'+dados[i].COD_DEMANDA+'</td>';
                grid += ' <td>'+dados[i].DSC_DEMANDA+'</td>';
                grid += ' <td>'+dados[i].NME_SISTEMA+'</td>';
                grid += ' <td>'+dados[i].NME_USUARIO_COMPLETO+'</td>';
                grid += ' <td align="center">'+dados[i].DSC_TIPO+'</td>';
                grid += ' <td align="center">'+dados[i].DSC_PRIORIDADE+'</td>';
                grid += ' <td>'+dados[i].DSC_SITUACAO+'</td>';
                grid += ' <td>';
                if(dados[i].COD_SITUACAO != 6) {
                    grid += '   <button class="btn btn-link" title="Editar" onClick="javascript:editarDemanda('+i+');">';
                    grid += '       <i class="fa-solid fa-pencil"></i>';
                    grid += '   </button>';
                }else {
                    grid += '   <button class="btn btn-link" title="Visualizar" onClick="javascript:visualizarDemanda('+i+');">';
                    grid += '       <i class="fa-regular fa-eye"></i>';
                    grid += '   </button>';
                }
                grid += '   <button class="btn btn-link" title="Histórico" onClick="javascript:carregaGridHistorico('+dados[i].COD_DEMANDA+');" data-toggle="modal" data-target="#historicoDemanda">';
                grid += '       <i class="fa-solid fa-clock-rotate-left"></i>';
                grid += '   </button>';
                grid += ' </td>';
                grid += '</tr>';
            }
        }
        grid += '</tbody>';
        grid += '</table>';
        $("#tabelaDemandas").html(grid);
        criarDataTable("tbDemandas", 8);
    } 
}

function editarDemanda(indice) {
    carregaCamposDemanda(indice);
    listaComboSituacao();
    $("#btnInformacao").attr('disabled', false);
    $("#btnInformacao").attr('title', 'Incluir informação');
    $("#descricaoEdit").removeClass("show");
    $("#accordionDscEdit").html("");
    $("#updateDemandaTitle").html('Editar Demanda');
    $("#accordionEdit").show();
    $("#updateDemanda").modal('show');
}

function retornoUpdateDemandas(retorno){
    if (retorno[0]){
        $("#codSituacaoAnterior").val($("#comboSituacao").val());
        carregaGridDemandas();
        swal({
            title: "Sucesso!",
            text: "Registro salvo com sucesso!",
            type: "success",
            showConfirmButton: false,
            timer: 1500
        });
        $("#updateDemanda").modal('hide');
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

function visualizarDemanda(indice) {
    $("#codDemanda").val(dadosListagem[indice].COD_DEMANDA);
    $(".dscDemanda").html(dadosListagem[indice].DSC_DEMANDA);
    $(".responsavel").html(dadosListagem[indice].NME_USUARIO_COMPLETO);
    $(".dscSistema").html(dadosListagem[indice].NME_SISTEMA);
    $("#status").html(dadosListagem[indice].DSC_SITUACAO);
    $(".dscPrioridade").html(dadosListagem[indice].DSC_PRIORIDADE);
    $(".tipoDemanda").html(dadosListagem[indice].DSC_TIPO);
    $("#footer-visu").hide();
    $("#descricao").removeClass("show");
    $("#visuDemanda").modal('show');
}

function carregaCamposDemanda(indice){
    $("#codDemanda").val(dadosListagem[indice].COD_DEMANDA);
    $("#dscDemanda").val(dadosListagem[indice].DSC_DEMANDA);
    $("#dtaDemanda").val(dadosListagem[indice].DTA_DEMANDA);
    $("#codSistema").val(dadosListagem[indice].COD_SISTEMA);
    $("#codResponsavel").val(dadosListagem[indice].COD_RESPONSAVEL);
    codSituacaoDmd = dadosListagem[indice].COD_SITUACAO;
    $("#codSituacao").val(dadosListagem[indice].COD_SITUACAO);
    $("#codSistemaOrigem").val(dadosListagem[indice].COD_SISTEMA_ORIGEM);
    $("#comboPrioridade").val(dadosListagem[indice].IND_PRIORIDADE);
    $("#comboTipoDemanda").val(dadosListagem[indice].TPO_DEMANDA);
    $("#codSituacaoAnterior").val(dadosListagem[indice].COD_SITUACAO);
}

function montaFiltroTpoDemanda(dados) {
    const arr = dados;
    CriarSelect('comboTpoDemanda', arr, -1, false);
    $("#comboTpoDemanda").change(function() {
        carregaGridDemandas();
    });
}

function montaFiltroSistemas(dados) {
    const arr = dados;
    CriarSelect('comboSistemas', arr, -1, false);
    $("#comboSistemas").change(function() {
        carregaGridDemandas();
    });
    montaComboSistemas(arr);
}

function montaFiltroResponsaveis(dados) {
    CriarSelect('comboResponsaveis', dados, -1, false);
    $("#comboResponsaveis").change(function() {
        carregaGridDemandas();
    });
}

$(document).ready(function() {
    ExecutaDispatch('Situacao', 'ListarSituacao', undefined, montaFiltroTpoDemanda);
    ExecutaDispatch('Sistemas', 'ListarSistemasAtivosPorUsuario', undefined, montaFiltroSistemas);
    ExecutaDispatch('Usuario', 'ListarUsuariosPorPerfil', 'codPerfil;2|SemResp;S', montaFiltroResponsaveis);
    ExecutaDispatch('Demandas', 'ListarDemandas', 'comboTpoDemanda;-1|comboSistemas;-1|comboResponsaveis;-1', montaGridDemandas);
    ExecutaDispatch('Usuario', 'ListarUsuariosPorPerfil', 'codPerfil;2|SemResp;N', montaComboResponsaveis);
} );
