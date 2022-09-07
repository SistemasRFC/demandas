var dadosMinhaDemanda;
var dadosDemandaPendente;

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
                grid += '   <button class="btn btn-link" title="Visualizar" onClick="javascript:visualizarDemanda('+i+');">';
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
                grid += '   <button class="btn btn-link" title="Atribuir para mim" onClick="javascript:mudarResponsavel('+dados[i].COD_USUARIO+');">';
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

function visualizarDemanda(indice, ref="M") {
    if(ref=="P"){
        carregaDemanda(indice, dadosDemandaPendente);
    } else {
        carregaDemanda(indice, dadosMinhaDemanda);
    }
    $("#visuDemanda").modal('show');
}

function carregaDemanda(i, lista){
    $(".codDemanda").val(lista[i].COD_DEMANDA);
    $(".dscDemanda").html(""+lista[i].DSC_DEMANDA);
    $(".responsavel").html(""+lista[i].NME_USUARIO_COMPLETO);
    $(".dscSistema").html(""+lista[i].NME_SISTEMA);
    $(".dscSituacao").html(""+lista[i].DSC_SITUACAO);
    $("#status").html(""+lista[i].DSC_SITUACAO);
    $(".dscPrioridade").html(""+lista[i].DSC_PRIORIDADE);
    $(".tipoDemanda").html(""+lista[i].DSC_TIPO);
}

$(document).ready(function() {
    ExecutaDispatch('Demandas', 'ListarDemandasUsuario', undefined, montaGridDemandasUsuario);
    ExecutaDispatch('Demandas', 'ListarDemandasAguardando', undefined, montaGridDemandasAguardando);
} );