$(function() {
    $("#btnDescricao").click(function(){
        $("#txtDescricao").prop('disabled', false);
        $("#tpoDescricao").prop('disabled', false);
        $("#descricaoDemanda").modal("show");
    });
    
    $("#btnDsc").click(function() {
        carregaDscDemanda();
    });
});

function carregaDscDemanda(){
    ExecutaDispatch('DescricaoDemandas', 'ListarDescricaoDemandas', 'codDemanda;'+$("#codDemanda").val(), montaDescricao);
}

function montaDescricao(dados){
    if (dados[0]) {
        var grid = '<table id="tbAccordionDsc" class="table table-striped">';
        grid += '<thead><tr>';
        grid += ' <th><b>Descrição</b></th>';
        grid += ' <th><b>tipo</b></th>';
        grid += ' <th><b>Responsável</b></th>';
        grid += ' <th><b>Ações</b></th>';
        grid += '</tr></thead><tbody>';
        if (dados[1] !== null) {
            dados = dados[1];
            for (i = 0; i < dados.length; i++) {
                grid += '<tr>';
                grid += ' <td>' + dados[i].TXT_DESCRICAO_TOTAL + '</td>';
                grid += ' <td>' + dados[i].TPO_DESCRICAO + '</td>';
                grid += ' <td>' + dados[i].NME_USUARIO + '</td>';
                grid += ' <td>';
                grid += '   <button class="btn btn-link" title="Visualizar" onClick="javascript:visualizarDescricao('+i+');">';
                grid += '       <i class="fa-regular fa-eye"></i>';
                grid += '   </button>';
                grid += ' </td>';
                grid += '</tr>';
            }
        }
        grid += '</tbody>';
        grid += '</table>';
        $("#accordionDsc").html(grid);
        criarDataTableBasic("tbAccordionDsc");
    } 
}

function visualizarDescricao(indice) {
    $("#txtDescricao").val(dadosDsc[indice].TXT_DESCRICAO_TOTAL);
    $("#tpoDescricao").val(dadosDsc[indice].TPO_DESCRICAO);
    $("#txtDescricao").prop('disabled', true);
    $("#tpoDescricao").prop('disabled', true);
    $("#descricaoDemanda").modal("show");

}