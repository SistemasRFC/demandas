$(function() {
    $("#btnSalvarPeriodo").click(function(){
        if($("#codConfiguraCor").val() === ''){
            inserirPeriodoCor();
        }else{
            updatePeriodoCor();
        }
    });
});
    
function inserirPeriodoCor(){
    swal({
        title: "Aguarde, salvando registro!",
        imageUrl: "../../Resources/images/preload.gif",
        showConfirmButton: false
    });
    parametros = 'codConfiguraCor<=>'+$("#codConfiguraCor").val()+'|vlrTempoInicial<=>'+$("#vlrTempoInicial").val()+'|vlrTempoFinal<=>'+$("#vlrTempoFinal").val()+'|dscCor<=>'+$("#dscCor").val();
    ExecutaDispatch('ConfiguraCor', 'InsertConfiguraCor', parametros, retornoInsertPeriodoCor);
}

function retornoInsertPeriodoCor(retorno){
    if (retorno[0]){
        $("#codConfiguraCor").val('');
        $("#vlrTempoInicial").val('');
        $("#vlrTempoFinal").val('');
        $("#dscCor").val('');
        carregaGridPeriodos();
        swal({
            title: "Sucesso!",
            text: "Registro salvo com sucesso!",
            type: "success",
            confirmButtonText: "Fechar"
        });        
        $("#cadCorPeriodo").modal("hide");
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


function carregaCamposPeriodo(codConfiguraCor, tempoInicial, tempoFinal, dscCor){
    $("#codConfiguraCor").val(codConfiguraCor);
    $("#vlrTempoInicial").val(tempoInicial);
    $("#vlrTempoFinal").val(tempoFinal);
    $("#dscCor").val(dscCor);
    $("#cadCorPeriodoTitle").html("Editar Configuração");
    $("#cadCorPeriodo").modal('show');
}

function updatePeriodoCor(){
    swal({
        title: "Aguarde, salvando registro!",
        imageUrl: "../../Resources/images/preload.gif",
        showConfirmButton: false
    });
    parametros = 'codConfiguraCor<=>'+$("#codConfiguraCor").val()+'|vlrTempoInicial<=>'+$("#vlrTempoInicial").val()+'|vlrTempoFinal<=>'+$("#vlrTempoFinal").val()+'|dscCor<=>'+$("#dscCor").val();
    ExecutaDispatch('ConfiguraCor', 'UpdateConfiguraCor', parametros, retornoInsertPeriodoCor);
}