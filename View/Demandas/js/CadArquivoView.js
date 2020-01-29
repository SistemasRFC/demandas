$(function() {
    $("#btnSalvarArquivo").click(function(){
        inserirArquivo();
    });

});

function inserirArquivo(){
    swal({
        title: "Aguarde, salvando registro!",
        imageUrl: "../../Resources/images/preload.gif",
        showConfirmButton: false
    });
    if ($("#arquivoScript").val()!==""){
        var formData = new FormData($('#cadArquivoForm')[0]);
        $.ajax({
            url: '../../Dispatch.php?controller=ArquivoDemandas&method=uploadArquivo&verificaPermissao=N',
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data){
                data = eval('('+data+')');
                if(data.sucesso == true){
                    parametros = 'codDemanda;'+$("#codDemanda").val()+'|dscArquivo;'+$("#dscArquivo").val()+'|arquivoScript;'+data.msg;
                    ExecutaDispatch('ArquivoDemandas', 'InsertArquivoDemandas', parametros, retornoInsertArquivo);
                }
            }
        });        
//        ExecutaDispatch('ArquivoDemandas', 'uploadArquivoDemandas', 'arquivo;'+formData, retornoCaminhoArquivo);
    }else{
        $(".jquery-waiting-base-container").fadeOut({modo:"fast"});
        swal({
            title: "Aviso!",
            text: "Selecione um arquivo!!",
            type: "info",
            confirmButtonText: "Fechar"
        });
    }
}

//function retornoCaminhoArquivo(data){    
//    if(data.sucesso == true){
//        $("#dscCaminhoArquivo").val(data.msg);
//        parametros = 'codDemanda;'+$("#codDemanda").val()+'|txtDescricao;'+$("#dscCaminhoArquivo").val()+'|tpoDescricao;'+$("#tpoDescricao").val();
//        ExecutaDispatch('ArquivoDemandas', 'InsertArquivoDemandas', parametros, retornoInsertArquivo);
//        $('#resposta').html('<img src="'+ data.msg +'" />');
//    }else{
//        $('#resposta').html(data.msg);
//    }
//}

function retornoInsertArquivo(retorno){
    if (retorno[0]){
        $("#dscArquivo").val('');
        $("#arquivoScript").val('');
        carregaGridArquivo();
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

function carregaGridArquivo(){
    ExecutaDispatch('ArquivoDemandas', 'ListarArquivoDemandas', 'codDemanda;'+$("#codDemanda").val(), montaGridArquivo);
}

function montaGridArquivo(dados){
    if (dados[0]) {
        if (dados[1] !== null) {
            dados = dados[1];
            var grid = '<table id="tbArquivo" class="display" style="width:100%">';
            grid += '<thead><tr>';
            grid += ' <th><b>Data</b></th>';
            grid += ' <th><b>Descrição</b></th>';
            grid += ' <th><b>Arquivo</b></th>';
            grid += ' <th><b>Ação</b></th>';
            grid += '</tr></thead><tbody>';
            for (i = 0; i < dados.length; i++) {
                grid += '<tr>';
                grid += ' <td>' + dados[i].DTA_ARQUIVO + '</td>';
                grid += ' <td>' + dados[i].DSC_ARQUIVO + '</td>';
                grid += ' <td><a href="'+ dados[i].TXT_CAMINHO_ARQUIVO + '"  download>'+
                              '<img src=\"'+dados[i].DSC_TIPO_ARQUIVO+'" width=\"25\" height=\"25\" title=\"Baixar arquivo\"></a>'+'&nbsp;&nbsp;&nbsp;'+ dados[i].TXT_CAMINHO_ARQUIVO +'</td>';
                grid += " <td><a href=\"javascript:excluirArquivo('" + dados[i].COD_ARQUIVO + "');\">Excluir</a></td>";
                grid += '</tr>';
            }
            grid += '</tbody>';
            grid += '</table>';
            $("#tabelaArquivo").html(grid);
            $('#tbArquivo').DataTable({
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
            $("#tabelaArquivo").html(grid);
        }
    } 
}

//function baixarArquivo(txtCompleto){
//    $("#txtArquivoTotal").val(txtCompleto);
//    $("#textoArquivo").modal('show');
//}

function excluirArquivo(codArquivo){
    ExecutaDispatch('ArquivoDemandas', 'DeleteArquivoDemandas', 'codArquivo;'+codArquivo, carregaGridArquivo);
}