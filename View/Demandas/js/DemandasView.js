var dadosListagem;
$(function() {
    $("#btnNovaDemanda").click(function(){
        $("#codDemanda").val('');
        $("#dscDemanda").val('');
        $("#comboSistema").val('');
        $("#codSistemaOrigem").val('');
        $("#comboResponsaveis").val('');
        $("#comboSituacao").val('');
        $("#comboPrioridade").val('');
        $("#comboTipoDemanda").val('');
        $("#accordionEdit").hide();
        $("#updateDemandaTitle").html("Incluir Demanda");
        $("#updateDemanda").modal("show");
    });
});

function carregaGridDemandas(){
    ExecutaDispatch('Demandas', 'ListarDemandas', 'comboTpoDemanda;'+$("#comboTpoDemanda").val(), montaGridDemandas);
}

function montaGridDemandas(dados){
    if(dados[0]){
        var grid = '<table id="tbDemandas" class="table table-striped table-responsive">';
        grid += '<thead><tr>';
        grid += ' <th width="10%"><b>Duração</b></th>';
        grid += ' <th width="6%"><b>Tipo</b></th>';
        grid += ' <th width="35%"><b>Demanda</b></th>';
        grid += ' <th width="8%"><b>Sistema</b></th>';
        grid += ' <th width="10%"><b>Reponsável</b></th>';
        grid += ' <th width="3%"><b>Prioridade</b></th>';
        grid += ' <th width="12%"><b>Status</b></th>';
        grid += ' <th width="5%"><b>Ações</b></th>';
        grid += '</tr></thead><tbody>';
        if(dados[1] !== null){
            dadosListagem = dados[1];
            dados = dados[1];
            for (i=0;i<dados.length;i++){
                grid += '<tr>';
                grid += ' <td style="background-color:'+dados[i].DSC_COR+'">'+dados[i].DIAS_DECORRIDAS+' Dia(s)<br>'+dados[i].HORAS_DECORRIDAS+' Hr(s)</td>';
                grid += ' <td align="center">'+dados[i].DSC_TIPO+'</td>';
                grid += ' <td>'+dados[i].DSC_DEMANDA+'</td>';
                grid += ' <td>'+dados[i].NME_SISTEMA+'</td>';
                grid += ' <td>'+dados[i].NME_USUARIO_COMPLETO+'</td>';
                grid += ' <td align="center">'+dados[i].DSC_PRIORIDADE+'</td>';
                grid += ' <td>'+dados[i].DSC_SITUACAO+'</td>';
                grid += ' <td>';
                if(dados[i].COD_SITUACAO != 6) {
                    if(localStorage.getItem("codUsuario") == dados[i].COD_RESPONSAVEL || localStorage.getItem("codUsuario") == dados[i].COD_USUARIO) {
                        grid += '   <button class="btn btn-link" title="Editar" onClick="javascript:editarDemanda('+i+');">';
                        grid += '       <i class="fa-solid fa-pencil"></i>';
                        grid += '   </button>';
                    }
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
        criarDataTable("tbDemandas");
    } 
}

function editarDemanda(indice) {
    carregaCamposDemanda(indice);
    $("#accordionEdit").show();
    $("#updateDemandaTitle").html('Editar Demanda');
    $("#updateDemanda").modal('show');
}

function visualizarDemanda(indice) {
    $(".codDemanda").val(dadosListagem[indice].COD_DEMANDA);
    $(".dscDemanda").html(dadosListagem[indice].DSC_DEMANDA);
    $(".responsavel").html(dadosListagem[indice].NME_USUARIO_COMPLETO);
    $(".dscSistema").html(dadosListagem[indice].NME_SISTEMA);
    $("#status").html(dadosListagem[indice].DSC_SITUACAO);
    $(".dscPrioridade").html(dadosListagem[indice].DSC_PRIORIDADE);
    $(".tipoDemanda").html(dadosListagem[indice].DSC_TIPO);
    if(dadosListagem[indice].COD_SITUACAO == 6) {
        $("#footer-visu").hide();
    } else {
        $("#footer-visu").show();
    }
    $("#visuDemanda").modal('show');
}

function carregaCamposDemanda(indice){
    $("#codDemanda").val(dadosListagem[indice].COD_DEMANDA);
    $("#dscDemanda").val(dadosListagem[indice].DSC_DEMANDA);
    $("#dtaDemanda").val(dadosListagem[indice].DTA_DEMANDA);
    $("#comboResponsaveis").val(dadosListagem[indice].COD_RESPONSAVEL);
    $("#comboSistema").val(dadosListagem[indice].COD_SISTEMA);
    $("#codSistemaOrigem").val(dadosListagem[indice].COD_SISTEMA_ORIGEM);
    $("#comboSituacao").val(dadosListagem[indice].COD_SITUACAO);
    $("#comboPrioridade").val(dadosListagem[indice].IND_PRIORIDADE);
    $("#comboTipoDemanda").val(dadosListagem[indice].TPO_DEMANDA);
    $("#codSituacaoAnterior").val(dadosListagem[indice].COD_SITUACAO);
}

function montaComboTpoDemanda(dados){
    if(dados[0]){
        dados = dados[1];
        combo = '<label for="comboTpoDemanda" class="col-sm-2 px-0 col-form-label">Filtro: </label>';
        combo += '<div class="col-sm-10">';
        combo += '<select id="comboTpoDemanda" class="form-control dropdown-toggle">';
        combo += '<option value="0" selected> TODOS </option>';
        for (i=0;i<dados.length;i++){
            combo += '<option value="'+dados[i].COD_SITUACAO+'">'+dados[i].DSC_SITUACAO+'</option>';
        }
        combo +='</select>';
        combo +='</div>';
        $("#divComboTpoDemanda").html(combo);
        $("#comboTpoDemanda").change(function(){
            carregaGridDemandas();
        });
    }
}

$(document).ready(function() {
    ExecutaDispatch('Situacao', 'ListarSituacao', undefined, montaComboTpoDemanda);
    ExecutaDispatch('Demandas', 'ListarDemandas', 'comboTpoDemanda;0', montaGridDemandas);
    $("#updateDemanda").on('show', function (e) {
        if($("#codDemanda").val() == ''){
            $("#btnHistorico").hide();
            $("#btnDescricao").hide();
            $("#btnArquivos").hide();
        }else{
            $("#btnHistorico").show();
            $("#btnDescricao").show();
            $("#btnArquivos").show();
        }
    });
} );