$(function() {
    $("#btnSalvarSituacao").click(function(){
        if($("#codSituacao").val() === ''){
            inserirSituacao();
        }else{
            updateSituacao();
        }
    });

});

function inserirSituacao(){
    swal({
        title: "Aguarde, salvando registro!",
        imageUrl: "../../Resources/images/preload.gif",
        showConfirmButton: false
    });
    parametros = 'codSituacao;'+$("#codSituacao").val()+'|dscSituacao;'+$("#dscSituacao").val();
    ExecutaDispatch('Situacao', 'InsertSituacao', parametros, retornoInsert);
}

function retornoInsert(retorno){
    
    if (retorno[0]){
        $("#codSituacao").val('');
        $("#dscSituacao").val('');
        carregaGridSituacao();
        swal({
            title: "Sucesso!",
            text: "Registro salvo com sucesso!",
            type: "success",
            confirmButtonText: "Fechar"
        });        
        $("#cadSituacao").modal("hide");
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


function carregaCamposSituacao(codSituacao, dscSituacao){
    $("#codSituacao").val(codSituacao);
    $("#dscSituacao").val(dscSituacao);
    $("#cadSituacao").modal('show');
}

function updateSituacao(){
    swal({
        title: "Aguarde, salvando registro!",
        imageUrl: "../../Resources/images/preload.gif",
        showConfirmButton: false
    });
    parametros = 'codSituacao;'+$("#codSituacao").val()+'|dscSituacao;'+$("#dscSituacao").val();
    ExecutaDispatch('Situacao', 'UpdateSituacao', parametros, retornoInsert);
}