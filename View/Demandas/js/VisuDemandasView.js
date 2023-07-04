var dadosDsc;
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

function montaDescricao(resp){
    if (resp[0]) {
        var grid = '<table id="tbAccordionDsc" class="table table-striped">';
        grid += '<thead><tr>';
        grid += ' <th><b>Descrição</b></th>';
        grid += ' <th><b>tipo</b></th>';
        grid += ' <th><b>Responsável</b></th>';
        grid += ' <th><b>Ações</b></th>';
        grid += '</tr></thead><tbody>';
        if (resp[1] !== null) {
            dadosDsc = resp[1];
            dados = resp[1];
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
    $("#codDescricao").val(dadosDsc[indice].COD_DESCRICAO);
    $("#txtDescricao").val(dadosDsc[indice].TXT_DESCRICAO_TOTAL);
    $("#tpoDescricao").val(dadosDsc[indice].TPO_DESCRICAO.substring(0,1));
    $("#txtDescricao").prop('disabled', true);
    $("#tpoDescricao").prop('disabled', true);
    $("#btnSalvarDescricao").prop('hidden', true);
    $("#descricaoDemanda").modal("show");

}