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
        $("#updateDemanda").modal("show");
    });
});

// function filtrarDemandas() {
//     if ($("#comboTpoDemanda").val()!== null){
//         carregaGridDemandas();   
//     }
// }

function carregaGridDemandas(){
    ExecutaDispatch('Demandas', 'ListarDemandas', 'comboTpoDemanda;'+$("#comboTpoDemanda").val(), montaGridDemandas);
}

function montaGridDemandas(dados){
   if(dados[0]){
        var grid = '<table id="tbDemandas" class="table table-striped">';
        grid += '<thead><tr>';
        grid += ' <th width="3%"><b>Nro.</b></th>';
        grid += ' <th width="10%"><b>Duração</b></th>';
        grid += ' <th width="8%"><b>Data</b></th>';
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
                 grid += ' <td style="background-color:'+dados[i].DSC_COR+'">'+dados[i].COD_DEMANDA+'</td>';
                 grid += ' <td>'+dados[i].DIAS_DECORRIDAS+' Dia(s)<br>'+dados[i].HORAS_DECORRIDAS+' Hr(s)</td>';
                 grid += ' <td>'+dados[i].DTA_DEMANDA+'</td>';
                 grid += ' <td align="center">'+dados[i].DSC_TIPO+'</td>';
                 grid += ' <td>'+dados[i].DSC_DEMANDA+'</td>';
                 grid += ' <td>'+dados[i].NME_SISTEMA+'</td>';
                 grid += ' <td>'+dados[i].NME_USUARIO_COMPLETO+'</td>';
                 grid += ' <td align="center">'+dados[i].DSC_PRIORIDADE+'</td>';
                 grid += ' <td>'+dados[i].DSC_SITUACAO+'</td>';
                 grid += ' <td>';
                 if(localStorage.getItem("codUsuario") == dados[i].COD_RESPONSAVEIS || localStorage.getItem("codUsuario") == dados[i].COD_USUARIO) {
                     grid += '   <button class="btn btn-link" title="Editar" onClick="javascript:carregaCamposDemanda('+i+');">';
                     grid += '       <i class="fa-solid fa-pencil"></i>';
                     grid += '   </button>';
                 }
                 grid += '   <button class="btn btn-link" title="Histórico" onClick="javascript:carregaGridHistorico('+dados[i].COD_DEMANDA+');">';
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

function carregaGridHistorico(codDemanda){
    ExecutaDispatch('Demandas', 'ListarLogsDemanda', 'codDemanda;'+codDemanda, montaGridHistorico);
}

function montaGridHistorico(dados){
    if(dados[0]){ 
        var grid = '<table id="tbHistorico" class="display">';
        grid += '<thead><tr>';
        grid += ' <th><b>Data</b></th>';
        grid += ' <th><b>Tipo de Operação</b></th>';
        grid += ' <th><b>Situação da Demanda</b></th>';
        grid += ' <th><b>Usuario</b></th>';
        grid += '</tr></thead><tbody>';
        if(dados[1]!== null){
            dados = dados[1];
            for (i=0;i<dados.length;i++){
                grid += '<tr>';
                grid += ' <td>'+dados[i].DTA_OPERACAO+'</td>';
                grid += ' <td>'+dados[i].TPO_OPERACAO+'</td>';
                grid += ' <td>'+dados[i].DSC_SITUACAO+'</td>';
                grid += ' <td>'+dados[i].NME_USUARIO+'</td>';
                grid += '</tr>';
            }
        }
        grid += '</tbody>';
        grid += '</table>';
        $("#tabelaHistorico").html(grid);
        $("#historicoDemanda").modal("show");
        criarDataTable("tbHistorico");
    } 
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
        // $("#comboTpoDemanda").val(0);
    }
}

$(document).ready(function() {
    ExecutaDispatch('Situacao', 'ListarSituacao', undefined, montaComboTpoDemanda);
    ExecutaDispatch('Demandas', 'ListarDemandas', 'comboTpoDemanda;0', montaGridDemandas);
    $("#updateDemanda").on('show.bs.modal', function (e) {
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