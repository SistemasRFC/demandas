$(function() {
    $("#btnSalvarSistema").click(function(){
        if($("#codSistema").val() === ''){
            inserirSistema();
        }else{
            updateSistema();
        }
    });

});

function inserirSistema(){
    swal({
        title: "Aguarde, salvando registro!",
        imageUrl: "../../Resources/images/preload.gif",
        showConfirmButton: false
    });    
    var indAtivo='N';
    if ($("#indAtivo").is(":checked")){
        indAtivo = 'S';
    }
    parametros = 'codSistema<=>'+$("#codSistema").val()+'|nmeSistema<=>'+$("#nmeSistema").val()+'|nmeBanco<=>'+$("#nmeBanco").val()+'|indAtivo<=>'+indAtivo;
    ExecutaDispatch('Sistemas', 'InsertSistemas', parametros, retornoInsertSistema);
}

function retornoInsertSistema(retorno){
    
    if (retorno[0]){
        $("#codSistema").val('');
        $("#nmeSistema").val('');
        $("#nmeBanco").val('');
        $("#indAtivo").attr('checked', false);
        carregaGridSistemas();
        swal({
            title: "Sucesso!",
            text: "Registro salvo com sucesso!",
            type: "success",
            confirmButtonText: "Fechar"
        });        
        $("#updateSistema").modal("hide");
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


function carregaCamposSistema(codSistema, nmeSistema, nmeBanco, indAtivo){
    $("#codSistema").val(codSistema);
    $("#nmeSistema").val(nmeSistema);
    $("#nmeBanco").val(nmeBanco);
    if(indAtivo == 'Não'){
        $("#indAtivo").prop('checked', false);
    }else{
        $("#indAtivo").prop('checked', 'checked');
    }    
    $("#updateSistemaTitle").html("Editar Sistema");
    $("#updateSistema").modal('show');
}

function updateSistema(){
    swal({
        title: "Aguarde, salvando registro!",
        imageUrl: "../../Resources/images/preload.gif",
        showConfirmButton: false
    });    
    var indAtivo='N';
    if ($("#indAtivo").is(":checked")){
        indAtivo = 'S';
    }
    parametros = 'codSistema<=>'+$("#codSistema").val()+'|nmeSistema<=>'+$("#nmeSistema").val()+'|nmeBanco<=>'+$("#nmeBanco").val()+'|indAtivo<=>'+indAtivo;
    ExecutaDispatch('Sistemas', 'UpdateSistemas', parametros, retornoInsertSistema);
}