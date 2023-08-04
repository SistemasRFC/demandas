$(function() {
    $("#btnSalvarDescricao").click(function(){
        var acao = 'InsertDescricaoDemandas';
        if($("#codDescricao").val() > 0) {
            acao = 'UpdateDescricaoDemandas';
        }
        inserirDescricao(acao);
    });

});

function inserirDescricao(method){
    if($("#tpoDescricao").val() == null || $("#tpoDescricao").val() == '') {
        swal({
            title: "Erro!",
            text: "Selecione um tipo de descrição!",
            type: "error",
            confirmButtonText: "Fechar"
        });
        return false;
    }
    swal({
        title: "Aguarde, salvando registro!",
        imageUrl: "../../Resources/images/preload.gif",
        showConfirmButton: false
    });
        parametros = 'codDescricao<=>'+$("#codDescricao").val()+'|codDemanda<=>'+$("#codDemanda").val()+'|txtDescricao<=>'+$("#txtDescricao").val()+'|codSistemaOrigem<=>'+"1"+'|tpoDescricao<=>'+$("#tpoDescricao").val();
        ExecutaDispatch('DescricaoDemandas', method, parametros, retornoInsertDescricao);
}

function retornoInsertDescricao(retorno){
    if (retorno[0]){
        $("#codDescricao").val(0);
        $("#txtDescricao").val('');
        $("#tpoDescricao").val('');
        swal({
            title: "Sucesso!",
            text: "Registro salvo com sucesso!",
            type: "success",
            showConfirmButton: false,
            timer: 1500
        });
        carregaDscDemandaEdit();
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
