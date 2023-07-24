var dadosDsc;
$(function() {
    $("#btnCancelarDescricaoVisu").click(function() {
        $("#formInformacaoVisu").hide();
        $(this).hide();
    });
    
    $("#btnDsc").click(function() {
        $("#formInformacaoVisu").hide();
        $("#btnCancelarDescricaoVisu").hide();
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
        criarDataTableBasic("tbAccordionDsc", true, 35);
    } 
}

function visualizarDescricao(indice) {
    $("#codDescricaoV").val(dadosDsc[indice].COD_DESCRICAO);
    $("#txtDescricaoV").val(dadosDsc[indice].TXT_DESCRICAO_TOTAL);
    $("#tpoDescricaoV").val(dadosDsc[indice].TPO_DESCRICAO.substring(0,1));
    $("#txtDescricaoV").prop('disabled', true);
    $("#tpoDescricaoV").prop('disabled', true);
    $("#formInformacaoVisu").show();
    $("#btnCancelarDescricaoVisu").show();

}