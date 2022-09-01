$(function() {
    $("#btnNovoPeriodo").click(function(){
        $("#codConfiguraCor").val('');
        $("#vlrTempoInicial").val('');
        $("#vlrTempoFinal").val('');
        $("#dscCor").val('');
        $("#cadCorPeriodoTitle").html("Incluir Configuração");
        $("#cadCorPeriodo").modal("show");
    });

});

function carregaGridPeriodos(){
    ExecutaDispatch('ConfiguraCor', 'ListarConfiguraCor', undefined, montaGridPeriodos);
}

function montaGridPeriodos(dados){
    if(dados[0]){
        var tabela = '<table id="tbPeriodos" class="table table-striped">';
        tabela += '<thead>';
        tabela += '<tr>';
        tabela += '<th><b>Tempo Inicial</b></th>';
        tabela += '<th><b>Tempo Final</b></th>';
        tabela += '<th><b>Cor</b></th>';
        tabela += '<th><b>Ação</b></th>';
        tabela += '</tr>';
        tabela += '</thead><tbody>';
        if(dados[1]!=null) {
            dados = dados[1];
            for (i=0;i<dados.length;i++){
                tabela += '<tr>';
                tabela += '<td>'+dados[i].VLR_TEMPO_INICIAL+'</td>';
                tabela += '<td>'+dados[i].VLR_TEMPO_FINAL+'</td>';
                tabela += '<td>'+dados[i].DSC_COR+'</td>';
                tabela += ' <td>';
                tabela += '   <button class="btn btn-link" title="Editar" onClick="javascript:carregaCamposPeriodo('+dados[i].COD_CONFIGURA_COR+', `'+dados[i].VLR_TEMPO_INICIAL+'`, `'+dados[i].VLR_TEMPO_FINAL+'`, `'+dados[i].DSC_COR+'`);">';
                tabela += '       <i class="fa-solid fa-pencil"></i>';
                tabela += '   </button>';
                tabela += ' </td>';
                tabela += '</tr>';
            }
        }
        tabela += '</tbody>';
        tabela += '</table>';
        $("#tabelaPeriodos").html(tabela);
        criarDataTable("tbPeriodos");
    }
}

$(document).ready(function(){
    carregaGridPeriodos();
});