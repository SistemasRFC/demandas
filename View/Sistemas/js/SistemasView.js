$(function() {
    $("#btnNovoSistema").click(function(){
        $("#codSistema").val('');
        $("#nmeSistema").val('');
        $("#nmeBanco").val('');
        $("#indAtivo").attr('checked', false);
        $("#updateSistemaTitle").html("Incluir Sistema");
        $("#updateSistema").modal("show");
    });

});

function carregaGridSistemas(){
    ExecutaDispatch('Sistemas', 'ListarSistemas', undefined, montaGridSistemas);
}

function montaGridSistemas(dados){
    if(dados[0]){
        var tabela = '<table id="tbSistemas" class="table table-striped">';
        tabela += '<thead>';
        tabela += '<tr>';
        tabela += '<th><b>Sistema</b></th>';
        tabela += '<th><b>Banco</b></th>';
        tabela += '<th><b>Ativo?</b></th>';
        tabela += '<th><b>Ações</b></th>';
        tabela += '</tr>';
        tabela += '</thead><tbody>';
        if(dados[1]!=null) {
            dados = dados[1];
            for (i=0;i<dados.length;i++){
                tabela += '<tr>';
                tabela += '<td>'+dados[i].NME_SISTEMA+'</td>';
                tabela += '<td>'+dados[i].NME_BANCO+'</td>';
                tabela += '<td>'+dados[i].IND_ATIVO+'</td>';
                tabela += ' <td>';
                tabela += '   <button class="btn btn-link" title="Editar" onClick="javascript:carregaCamposSistema('+dados[i].COD_SISTEMA+', `'+dados[i].NME_SISTEMA+'`, `'+dados[i].NME_BANCO+'`, `'+dados[i].IND_ATIVO+'`);">';
                tabela += '       <i class="fa-solid fa-pencil"></i>';
                tabela += '   </button>';
                tabela += ' </td>';
                tabela += '</tr>';
            }
        }
        tabela += '</tbody>';
        tabela += '</table>';
        $("#tabelaSistemas").html(tabela);
        criarDataTable("tbSistemas");
    }
}

$(document).ready(function(){
    carregaGridSistemas();
});