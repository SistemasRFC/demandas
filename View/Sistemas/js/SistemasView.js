$(function() {
    $("#btnNovoSistema").click(function(){
        $("#codSistema").val('');
        $("#nmeSistema").val('');
        $("#nmeBanco").val('');
        $("#indAtivo").attr('checked', false);
        $("#updateSistema").modal("show");
    });

});

function carregaGridSistemas(){
    ExecutaDispatch('Sistemas', 'ListarSistemas', undefined, montaGridSistemas);
}

function montaGridSistemas(dados){
    if(dados[0]){
        dados = dados[1];
        var tabela = '<table id="tbSistemas" class="display" style="width:100%">';
        tabela += '<thead>';
        tabela += '<tr>';
        tabela += '<th><b>Sistema</b></th>';
        tabela += '<th><b>Banco</b></th>';
        tabela += '<th><b>Ativo?</b></th>';
        tabela += '<th><b>Ações</b></th>';
        tabela += '</tr>';
        tabela += '</thead><tbody>';
        for (i=0;i<dados.length;i++){

            tabela += '<tr>';
            tabela += '<td>'+dados[i].NME_SISTEMA+'</td>';
            tabela += '<td>'+dados[i].NME_BANCO+'</td>';
            tabela += '<td>'+dados[i].IND_ATIVO+'</td>';
            tabela += "<td><a href=\"javascript:carregaCamposSistema('"+dados[i].COD_SISTEMA+"', '"+dados[i].NME_SISTEMA+"', '"+dados[i].NME_BANCO+"', '"+dados[i].IND_ATIVO+"');\">Editar</a></td>";
            tabela += '</tr>';

        }
        tabela += '</tbody>';
        tabela += '</table>';
        $("#tabelaSistemas").html(tabela);
        $('#tbSistemas').DataTable({
            "ordering": false,
            "language": {
                "emptyTable": "Nenhum registro encontrado",
                "info": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                "infoEmpty": "Mostrando 0 até 0 de 0 registros",
                "infoFiltered": "(Filtrados de _MAX_ registros)",
                "infoPostFix": "",
                "infoThousands": ".",
                "lengthMenu": "_MENU_ resultados por página",
                "loadingRecords": "Carregando...",
                "processing": "Processando...",
                "zeroRecords": "Nenhum registro encontrado",
                "search": "Pesquisar: ",
                "paginate": {
                    "next": "Próximo",
                    "previous": "Anterior",
                    "first": "Primeiro",
                    "last": "Último"
                },
                "aria": {
                    "sortAscending": ": Ordenar colunas de forma ascendente",
                    "sortDescending": ": Ordenar colunas de forma descendente"
                }
            }
        });
    }
}

$(document).ready(function(){
    carregaGridSistemas();
});