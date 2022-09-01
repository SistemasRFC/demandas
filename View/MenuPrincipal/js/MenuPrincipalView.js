var dadosMinhaDemanda;

function openDescDemandas(cadDemanda){
    $('#codDemanda').val(cadDemanda);
    carregaGridDescricao();
    $("#descricaoDemanda").modal("show");
    
}

function montaGridDemandasUsuario(dados){
   if(dados[0]){
       dadosMinhaDemanda = dados[1];
       dados = dados[1];
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
            for (i=0;i<dados.length;i++){
                grid += "<tr onClick=\"javascript:carregaCamposMinhaDemanda("+i+");\">";
                // grid += "<a href=\"javascript:carregaCamposMinhaDemanda("+i+");\">";
                grid += ' <td>'+dados[i].COD_DEMANDA+'</td>';
                grid += ' <td>'+dados[i].DSC_DEMANDA+'</td>';
                grid += ' <td>'+dados[i].NME_SISTEMA+'</td>';
                grid += ' <td>'+dados[i].NME_USUARIO_COMPLETO+'</td>';
                grid += ' <td>'+dados[i].DSC_SITUACAO+'</td>';
                grid += ' <td>';
                grid += '   <button class="btn btn-link" title="Visualizar" onClick="javascript:carregaCamposMinhaDemanda('+i+');">';
                grid += '       <i class="fa-regular fa-eye"></i>';
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
                grid += '   <button class="btn btn-link" title="Visualizar" onClick="javascript:carregaVisualizarDemanda('+i+');">';
                grid += '       <i class="fa-regular fa-eye"></i>';
                grid += '   </button>';
                grid += '   <button class="btn btn-link" title="Atribuir para mim" onClick="javascript:mudarResponsavel('+dados[i].COD_USUARIO+');">';
                grid += '       <i class="fa-regular fa-eye"></i>';
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

function carregaCamposMinhaDemanda(indice){
//    console.log(dadosMinhaDemanda[indice]);
    $("#codDemanda").val(dadosMinhaDemanda[indice].COD_DEMANDA);
    $("#dscDemanda").val(dadosMinhaDemanda[indice].DSC_DEMANDA);
    $("#dtaDemanda").val(dadosMinhaDemanda[indice].DTA_DEMANDA);
    $("#comboResponsaveis").val(dadosMinhaDemanda[indice].COD_RESPONSAVEIS);
    $("#comboSistema").val(dadosMinhaDemanda[indice].COD_SISTEMA);
    $("#codSistemaOrigem").val(dadosMinhaDemanda[indice].COD_SISTEMA_ORIGEM);
    $("#comboSituacao").val(dadosMinhaDemanda[indice].COD_SITUACAO);
    $("#comboPrioridade").val(dadosMinhaDemanda[indice].IND_PRIORIDADE);
    $("#comboTipoDemanda").val(dadosMinhaDemanda[indice].TPO_DEMANDA);
    $("#codSituacaoAnterior").val(dadosMinhaDemanda[indice].COD_SITUACAO);
    $("#updateDemanda").modal('show');
}

$(document).ready(function() {
    ExecutaDispatch('Demandas', 'ListarDemandasUsuario', undefined, montaGridDemandasUsuario);
    ExecutaDispatch('Demandas', 'ListarDemandasAguardando', undefined, montaGridDemandasAguardando);
} );