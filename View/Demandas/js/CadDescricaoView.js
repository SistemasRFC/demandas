$(function() {
    $("#btnSalvarDescricao").click(function(){
        if($("#codDescricao").val() == 0) {
            inserirDescricao();
        }
    });

});

function inserirDescricao(){
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
        parametros = 'codDemanda;'+$("#codDemanda").val()+'|txtDescricao;'+$("#txtDescricao").val()+'|codSistemaOrigem;'+"1"+'|tpoDescricao;'+$("#tpoDescricao").val();
        ExecutaDispatch('DescricaoDemandas', 'InsertDescricaoDemandas', parametros, retornoInsertDescricao);
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
        $("#descricaoDemanda").modal("hide");
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
