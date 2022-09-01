$(function() {
    $("#btnNovaSituacao").click(function(){
        $("#codSituacao").val('');
        $("#dscSituacao").val('');
        $("#cadSituacaoTitle").html("Incluir Situação");
        $("#cadSituacao").modal("show");
    });

});

function carregaGridSituacao(){
    ExecutaDispatch('Situacao', 'ListarSituacao', undefined, montaGridSituacao);
}

function montaGridSituacao(dados){
    if(dados[0]){
        var tabela = '<table id="tbSituacoes" class="table table-striped">';
        tabela += '<thead>';
        tabela += '<tr>';
        tabela += '<th>Situação</th>';
        tabela += '<th>Ação</th>';
        tabela += '</tr>';
        tabela += '</thead>';
        tabela += '<tbody>';
        if(dados[1]!=null) {
            dados = dados[1];
            for (i=0;i<dados.length;i++){
                tabela += '<tr>';
                    tabela += '<td>'+dados[i].DSC_SITUACAO+'</td>';
                    tabela += ' <td>';
                    tabela += '   <button class="btn btn-link" title="Editar" onClick="javascript:carregaCamposSituacao('+dados[i].COD_SITUACAO+', `'+dados[i].DSC_SITUACAO+'`);">';
                    tabela += '       <i class="fa-solid fa-pencil"></i>';
                    tabela += '   </button>';
                    tabela += ' </td>';
                tabela += '</tr>';
            }
        }
        tabela += '</tbody>';
        tabela += '</table>';
        $("#tabelaSituacao").html(tabela);
        criarDataTable("tbSituacoes");
    }
}

$(document).ready(function(){
    carregaGridSituacao();
});