$(function() {
    $("#btnSalvarDescricao").click(function(){
        inserirDescricao();
    });

});

function inserirDescricao(){
    swal({
        title: "Aguarde, salvando registro!",
        imageUrl: "../../Resources/images/preload.gif",
        showConfirmButton: false
    });
        parametros = 'codDemanda;'+$("#codDemanda").val()+'|txtDescricao;'+$("#txtDescricao").val()+'|codSistemaOrigem;'+"1"+'|tpoDescricao;'+$("#tpoDescricao").val();
        ExecutaDispatch('DescricaoDemandas', 'InsertDescricaoDemandas', parametros, retornoInsertDescricao);
}

function retornoInsertDescricao(retorno){
    if (retorno[0]){
        $("#txtDescricao").val('');
        $("#tpoDescricao").val('');
        carregaGridDescricao();
        swal({
            title: "Sucesso!",
            text: "Registro salvo com sucesso!",
            type: "success",
            confirmButtonText: "Fechar"
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

function carregaGridDescricao(){
    ExecutaDispatch('DescricaoDemandas', 'ListarDescricaoDemandas', 'codDemanda;'+$("#codDemanda").val()+'|codSistemaOrigem;'+$("#codSistemaOrigem").val(), montaGridDescricao);
}

function montaGridDescricao(dados){
    if (dados[0]) {
        if (dados[1] !== null) {
            dados = dados[1];
            var grid = '<table id="tbDescricao" class="display" style="width:100%">';
            grid += '<thead><tr>';
            grid += ' <th><b>Data</b></th>';
            grid += ' <th><b>Descrição</b></th>';
            grid += ' <th>  </th>';
            grid += ' <th><b>tipo</b></th>';
            grid += ' <th><b>Usuário</b></th>';
            grid += ' <th><b>Ação</b></th>';
            grid += '</tr></thead><tbody>';
            for (i = 0; i < dados.length; i++) {
                grid += '<tr>';
                grid += ' <td>' + dados[i].DTA_DESCRICAO + '</td>';
                grid += ' <td>' + dados[i].TXT_DESCRICAO + '</td>';
                grid += " <td><a href=\"javascript:visualizarDescricao('" + dados[i].TXT_DESCRICAO_TOTAL + "');\">Ver mais</a></td>";
                grid += ' <td>' + dados[i].TPO_DESCRICAO + '</td>';
                grid += ' <td>' + dados[i].NME_USUARIO + '</td>';
                grid += " <td><a href=\"javascript:excluirDescricao('" + dados[i].COD_DESCRICAO + "');\">Excluir</a></td>";
                grid += '</tr>';
            }
            grid += '</tbody>';
            grid += '</table>';
            $("#tabelaDescricao").html(grid);
            $('#tbDescricao').DataTable({
                "filter": false,
                "ordering": false,
                "info": false,
                "paging": false,
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
        }else{
            var grid = 'Sem dados!';            
            $("#tabelaDescricao").html(grid);
        }
    } 
}

function visualizarDescricao(txtCompleto){
    $("#txtDescricaoTotal").val(txtCompleto);
    $("#textoDescricao").modal('show');
}

function excluirDescricao(codDescricao){
    ExecutaDispatch('DescricaoDemandas', 'DeleteDescricaoDemandas', 'codDescricao;'+codDescricao, carregaGridDescricao);
}