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
                    parametros = 'codDemanda<=>'+$("#codDemanda").val()+'|dscArquivo<=>'+$("#dscArquivo").val()+'|arquivoScript<=>'+data.msg;
                    ExecutaDispatch('ArquivoDemandas', 'InsertArquivoDemandas', parametros, retornoInsertArquivo);
                }
            }
        });
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
    ExecutaDispatch('ArquivoDemandas', 'ListarArquivoDemandas', 'codDemanda<=>'+$("#codDemanda").val(), montaGridArquivo);
}

function montaGridArquivo(dados){
    if (dados[0]) {
        var grid = '<table id="tbArquivo" class="display" style="width:100%">';
        grid += '<thead><tr>';
        grid += ' <th><b>Data</b></th>';
        grid += ' <th><b>Descrição</b></th>';
        grid += ' <th><b>Arquivo</b></th>';
        grid += ' <th><b>Ação</b></th>';
        grid += '</tr></thead><tbody>';
        if (dados[1] !== null) {
            dados = dados[1];
            for (i = 0; i < dados.length; i++) {
                grid += '<tr>';
                grid += ' <td>' + dados[i].DTA_ARQUIVO + '</td>';
                grid += ' <td>' + dados[i].DSC_ARQUIVO + '</td>';
                grid += ' <td><a href="'+ dados[i].TXT_CAMINHO_ARQUIVO + '"  download>'+
                              '<img src=\"'+dados[i].DSC_TIPO_ARQUIVO+'" width=\"25\" height=\"25\" title=\"Baixar arquivo\"></a>'+'&nbsp;&nbsp;&nbsp;'+ dados[i].TXT_CAMINHO_ARQUIVO +'</td>';
                grid += " <td><a href=\"javascript:excluirArquivo('" + dados[i].COD_ARQUIVO + "');\">Excluir</a></td>";
                grid += '</tr>';
            }
        } 
        grid += '</tbody>';
        grid += '</table>';
        $("#tabelaArquivo").html(grid);
        criarDataTableBasic("tbArquivo");
    }
}

//function baixarArquivo(txtCompleto){
//    $("#txtArquivoTotal").val(txtCompleto);
//    $("#textoArquivo").modal('show');
//}

function excluirArquivo(codArquivo){
    ExecutaDispatch('ArquivoDemandas', 'DeleteArquivoDemandas', 'codArquivo<=>'+codArquivo, carregaGridArquivo);
}