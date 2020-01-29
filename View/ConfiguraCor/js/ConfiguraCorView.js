$(function() {
    $("#btnNovoPeriodo").click(function(){
        $("#codConfiguraCor").val('');
        $("#vlrTempoInicial").val('');
        $("#vlrTempoFinal").val('');
        $("#dscCor").val('');
        $("#cadCorPeriodo").modal("show");
    });

});

function carregaGridPeriodos(){
    ExecutaDispatch('ConfiguraCor', 'ListarConfiguraCor', undefined, montaGridPeriodos);
}

function montaGridPeriodos(dados){
    if(dados[0]){
        dados = dados[1];
        var tabela = '<table id="tbPeriodos" class="display" style="width:100%">';
        tabela += '<thead>';
        tabela += '<tr>';
        tabela += '<th><b>Tempo Inicial</b></th>';
        tabela += '<th><b>Tempo Final</b></th>';
        tabela += '<th><b>Cor</b></th>';
        tabela += '<th><b>Ação</b></th>';
        tabela += '</tr>';
        tabela += '</thead><tbody>';
        for (i=0;i<dados.length;i++){

            tabela += '<tr>';
            tabela += '<td>'+dados[i].VLR_TEMPO_INICIAL+'</td>';
            tabela += '<td>'+dados[i].VLR_TEMPO_FINAL+'</td>';
            tabela += '<td>'+dados[i].DSC_COR+'</td>';
            tabela += "<td><a href=\"javascript:carregaCamposPeriodo('"+dados[i].COD_CONFIGURA_COR+"', '"+dados[i].VLR_TEMPO_INICIAL+"', '"+dados[i].VLR_TEMPO_FINAL+"', '"+dados[i].DSC_COR+"');\">Editar</a></td>";
            tabela += '</tr>';

        }
        tabela += '</tbody>';
        tabela += '</table>';
        $("#tabelaPeriodos").html(tabela);
        $('#tbPeriodos').DataTable({
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
    carregaGridPeriodos();
});