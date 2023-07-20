var dadosMinhaDemanda;
var dadosDemandaPendente;
var codSituacaoDmd;
var codSistemaDmd;
var codResponsavelDmd;

function openDescDemandas(cadDemanda){
    $('#codDemanda').val(cadDemanda);
    carregaGridDescricao();
    $("#descricaoDemanda").modal("show");
    
}

function montaGridDemandasUsuario(dados){
   if(dados[0]){
       var grid = '<table id="tbDemandasU" class="table table-striped" style="width:100%">';
       grid += '<thead><tr>';
       grid += ' <th><b>Cód.</b></th>';
       grid += ' <th><b>Demanda</b></th>';
       grid += ' <th><b>Sistema</b></th>';
       grid += ' <th><b>Responsável</b></th>';
       grid += ' <th><b>Status</b></th>';
       grid += ' <th><b>Ações</b></th>';
       grid += '</tr></thead><tbody>';
       if(dados[1] !== null){
           dadosMinhaDemanda = dados[1];
           dados = dados[1];
            for (i=0;i<dados.length;i++){
                grid += "<tr>";
                grid += ' <td>'+dados[i].COD_DEMANDA+'</td>';
                grid += ' <td>'+dados[i].DSC_DEMANDA+'</td>';
                grid += ' <td>'+dados[i].NME_SISTEMA+'</td>';
                grid += ' <td>'+dados[i].NME_USUARIO_COMPLETO+'</td>';
                grid += ' <td>'+dados[i].DSC_SITUACAO+'</td>';
                grid += ' <td>';
                grid += '   <button class="btn btn-link" title="Editar" onClick="javascript:editarDemanda('+i+');">';
                grid += '       <i class="fa-solid fa-pencil"></i>';
                grid += '   </button>';
                grid += ' </td>';
                grid += '</tr>';
            }
        }else {
            '<tr><td colspan="5">Sem demandas</td></tr>';
        }
        grid += '</tbody>';
        grid += '</table>';
        $("#tbDemandasUsuario").html(grid);
        criarDataTable("tbDemandasU");
    } 
}

function montaGridDemandasAguardando(dados){
   if(dados[0]){
        var grid = '<table id="tbDemandasA" class="table table-striped" style="width:100%">';
        grid += '<thead><tr>';
        grid += ' <th><b>Cód.</b></th>';
        grid += ' <th><b>Demanda</b></th>';
        grid += ' <th><b>Sistema</b></th>';
        grid += ' <th><b>Tipo de Demanda</b></th>';
        grid += ' <th><b>Prioridade</b></th>';
        grid += ' <th><b>Ações</b></th>';
        grid += '</tr></thead><tbody>';
        if(dados[1] !== null){
            dadosDemandaPendente = dados[1];
            dados = dados[1];
            for (i=0;i<dados.length;i++){
                grid += "<tr>";
                grid += ' <td>'+dados[i].COD_DEMANDA+'</td>';
                grid += ' <td>'+dados[i].DSC_DEMANDA+'</td>';
                grid += ' <td>'+dados[i].NME_SISTEMA+'</td>';
                grid += ' <td>'+dados[i].DSC_TIPO+'</td>';
                grid += ' <td>'+dados[i].DSC_PRIORIDADE+'</td>';
                grid += ' <td>';
                grid += '   <button class="btn btn-link" title="Visualizar" onClick="javascript:visualizarDemanda('+i+', `P`);">';
                grid += '       <i class="fa-regular fa-eye"></i>';
                grid += '   </button>';
                grid += '   <button class="btn btn-link" title="Atribuir para mim" onClick="javascript:mudarResponsavel('+dados[i].COD_DEMANDA+');">';
                grid += '       <i class="fa-regular fa-user"></i>';
                grid += '   </button>';
                grid += ' </td>';
                grid += '</tr>';
            }
        }
        grid += '</tbody>';
        grid += '</table>';
        $("#tbDemandasAguardando").html(grid);
        criarDataTable("tbDemandasA");
    } 
}

function editarDemanda(indice) {
    carregaCamposDemanda(indice);
    listaComboSistemas();
    listaComboSituacao();
    listaComboResponsaveis();
    $("#descricaoEdit").removeClass("show");
    $("#accordionDscEdit").html("");
    $("#updateDemandaTitle").html('Editar Demanda');
    $("#updateDemanda").modal('show');
}

function retornoUpdateDemandas(retorno){
    if (retorno[0]){
        $("#codSituacaoAnterior").val($("#codSituacao").val());
        carregaGridDemandasUsuario();
        swal({
            title: "Sucesso!",
            text: "Registro salvo com sucesso!",
            type: "success",
            showConfirmButton: false,
            timer: 1500
        });
        $("#updateDemanda").modal('hide');
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

function visualizarDemanda(i) {
    $("#codDemanda").val(dadosDemandaPendente[i].COD_DEMANDA);
    $(".dscDemanda").html(""+dadosDemandaPendente[i].DSC_DEMANDA);
    $(".responsavel").html(""+dadosDemandaPendente[i].NME_USUARIO_COMPLETO);
    $(".dscSistema").html(""+dadosDemandaPendente[i].NME_SISTEMA);
    $(".dscSituacao").html(""+dadosDemandaPendente[i].DSC_SITUACAO);
    $("#status").html(""+dadosDemandaPendente[i].DSC_SITUACAO);
    $(".dscPrioridade").html(""+dadosDemandaPendente[i].DSC_PRIORIDADE);
    $(".tipoDemanda").html(""+dadosDemandaPendente[i].DSC_TIPO);
    $("#descricao").removeClass("show");
    $("#visuDemanda").modal('show');
}

function carregaCamposDemanda(indice){
    $("#codDemanda").val(dadosMinhaDemanda[indice].COD_DEMANDA);
    $("#dscDemanda").val(dadosMinhaDemanda[indice].DSC_DEMANDA);
    $("#dtaDemanda").val(dadosMinhaDemanda[indice].DTA_DEMANDA);
    $("#codSistemaOrigem").val(dadosMinhaDemanda[indice].COD_SISTEMA_ORIGEM);
    codSituacaoDmd = dadosMinhaDemanda[indice].COD_SITUACAO;
    codSistemaDmd = dadosMinhaDemanda[indice].COD_SISTEMA;
    codResponsavelDmd = dadosMinhaDemanda[indice].COD_RESPONSAVEL;
    $("#codSituacao").val(dadosMinhaDemanda[indice].COD_SITUACAO);
    $("#codSistema").val(dadosMinhaDemanda[indice].COD_SISTEMA);
    $("#codResponsavel").val(dadosMinhaDemanda[indice].COD_RESPONSAVEL);
    $("#comboPrioridade").val(dadosMinhaDemanda[indice].IND_PRIORIDADE);
    $("#comboTipoDemanda").val(dadosMinhaDemanda[indice].TPO_DEMANDA);
    $("#codSituacaoAnterior").val(dadosMinhaDemanda[indice].COD_SITUACAO);
}

function mudarResponsavel(codDemanda) {
    ExecutaDispatch('Demandas', 'MudarResponsavelDemanda', 'codDemanda;'+codDemanda, retornoMudarResponsavel);
}

function retornoMudarResponsavel(resp) {
    if(resp[0]) {
        carregaGridDemandasUsuario();
        carregaGridDemandasAguardando();
        swal({
            title: "Sucesso!",
            text: "Resposável atualizado com sucesso!",
            type: "success",
            showConfirmButton: false,
            timer: 1500
        });
    } else {
        swal({
            title: "Erro!",
            text: resp[1],
            type: "error",
            confirmButtonText: "Fechar"
        });
    }
}

function carregaGridDemandasUsuario() {
    ExecutaDispatch('Demandas', 'ListarDemandasUsuario', undefined, montaGridDemandasUsuario);
}

function carregaGridDemandasAguardando() {
    ExecutaDispatch('Demandas', 'ListarDemandasAguardando', undefined, montaGridDemandasAguardando);
}

$(document).ready(function() {
    carregaGridDemandasUsuario();
    carregaGridDemandasAguardando();
} );