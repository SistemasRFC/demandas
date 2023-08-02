function carregaGridHistorico(codDemanda){
    ExecutaDispatch('Demandas', 'ListarLogsDemanda', 'codDemanda<=>'+codDemanda, montaGridHistorico);
}

function montaGridHistorico(dados){
    if(dados[0]){ 
        var grid = '<table id="tbHistorico" class="table table-striped mb-0" style="width: 100% !important">';
        grid += '<thead><tr>';
        grid += ' <th><b>Data</b></th>';
        grid += ' <th><b>Tipo de Operação</b></th>';
        grid += ' <th><b>Situação da Demanda</b></th>';
        grid += ' <th><b>Usuario</b></th>';
        grid += '</tr></thead><tbody>';
        if(dados[1]!== null){
            dados = dados[1];
            for (i=0;i<dados.length;i++){
                grid += '<tr>';
                grid += ' <td>'+dados[i].DTA_OPERACAO+'</td>';
                grid += ' <td>'+dados[i].TPO_OPERACAO+'</td>';
                grid += ' <td>'+dados[i].DSC_SITUACAO+'</td>';
                grid += ' <td>'+dados[i].NME_USUARIO+'</td>';
                grid += '</tr>';
            }
        }
        grid += '</tbody>';
        grid += '</table>';
        $("#tabelaHistorico").html(grid);
        criarDataTableBasic("tbHistorico");
    } 
}