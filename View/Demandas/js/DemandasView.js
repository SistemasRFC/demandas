var dadosListagem;
$(function() {
    $("#btnNovaDemanda").click(function(){
        $("#codDemanda").val('');
        $("#dscDemanda").val('');
        $("#comboSistema").val('');
        $("#codSistemaOrigem").val('');
        $("#comboResponsaveis").val('');
        $("#comboSituacao").val('');
        $("#comboPrioridade").val('');
        $("#comboTipoDemanda").val('');
        $("#updateDemanda").modal("show");
    });
    $("#btnPesquisarDemanda").click(function(){
        if ($("#comboTpoDemanda").val()!== null){
            carregaGridDemandas();   
        }else{
            $(".jquery-waiting-base-container").fadeOut({modo:"fast"});
        swal({
            title: "Aviso!",
            text: "Preencha o combo status!!",
            type: "info",
            confirmButtonText: "Fechar"
        });
        }
    });
});

function carregaGridDemandas(){
    ExecutaDispatch('Demandas', 'ListarDemandas', 'comboTpoDemanda;'+$("#comboTpoDemanda").val(), montaGridDemandas);
}

function montaGridDemandas(dados){
   if(dados[0]){
        if(dados[1] !== null){
            dadosListagem = dados[1];
             dados = dados[1];
             var grid = '<table id="tbDemandas" class="display" style="width:100%">';
             grid += '<thead><tr>';
             grid += ' <th width="3%"><b>Nro.</b></th>';
             grid += ' <th width="10%"><b>Duração</b></th>';
             grid += ' <th width="8%"><b>Data</b></th>';
             grid += ' <th width="6%"><b>Tipo</b></th>';
             grid += ' <th width="35%"><b>Demanda</b></th>';
             grid += ' <th width="8%"><b>Sistema</b></th>';
             grid += ' <th width="10%"><b>Reponsável</b></th>';
             grid += ' <th width="3%"><b>Prioridade</b></th>';
             grid += ' <th width="12%"><b>Status</b></th>';
             grid += ' <th width="5%"><b>Ações</b></th>';
             grid += '</tr></thead><tbody>';
             for (i=0;i<dados.length;i++){
                 grid += '<tr style=" background-color:'+dados[i].DSC_COR+'">';
                 grid += ' <td>'+dados[i].COD_DEMANDA+'</td>';
                 grid += ' <td>'+dados[i].DIAS_DECORRIDAS+' Dia(s)<br>'+dados[i].HORAS_DECORRIDAS+' Hr(s)</td>';
                 grid += ' <td>'+dados[i].DTA_DEMANDA+'</td>';
                 grid += ' <td align="center">'+dados[i].DSC_TIPO+'</td>';
                 grid += ' <td>'+dados[i].DSC_DEMANDA+'</td>';
                 grid += ' <td>'+dados[i].NME_SISTEMA+'</td>';
                 grid += ' <td>'+dados[i].NME_USUARIO_COMPLETO+'</td>';
                 grid += ' <td align="center">'+dados[i].DSC_PRIORIDADE+'</td>';
                 grid += ' <td>'+dados[i].DSC_SITUACAO+'</td>';
                 grid += " <td><a href=\"javascript:carregaCamposDemanda("+i+");\">Editar</a><br><a href=\"javascript:carregaGridHistorico('"+dados[i].COD_DEMANDA+"');\">Histórico</a></td>";
                 grid += '</tr>';
             }
             grid += '</tbody>';
             grid += '</table>';
             $("#tabelaDemandas").html(grid);
             $('#tbDemandas').DataTable({
                 "ordering": false,
                 "language": {
                     "emptyTable": "Nenhum registro encontrado",
                     "info": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                     "infoEmpty": "Mostrando 0 até 0 de 0 registros",
                     "infoFiltered": "(Filtrados de _MAX_ registros)",
                     "infoPostFix": "",
                     "infoThousands": ".",
                     "lengthMenu": "_MENU_ resultados por página",
                     "loadingRecords": "Carregando...",
                     "processing": "Processando...",
                     "zeroRecords": "Nenhum registro encontrado",
                     "search": "Pesquisar: ",
                     "paginate": {
                         "next": "Próximo",
                         "previous": "Anterior",
                         "first": "Primeiro",
                         "last": "Último"
                     },
                     "aria": {
                         "sortAscending": ": Ordenar colunas de forma ascendente",
                         "sortDescending": ": Ordenar colunas de forma descendente"
                     }
                 }
             });
        }else{
            var grid = 'Sem dados para essa consulta!';            
            $("#tabelaDemandas").html(grid);    
        }
    } 
}

function carregaGridHistorico(codDemanda){
    ExecutaDispatch('Demandas', 'ListarLogsDemanda', 'codDemanda;'+codDemanda, montaGridHistorico);
}

function montaGridHistorico(dados){
    if(dados[0]){ 
        if(dados[1]!== null){
        dados = dados[1];
        var grid = '<table id="tbHistorico" class="display" style="width:100%">';
        grid += '<thead><tr>';
        grid += ' <th><b>Data</b></th>';
        grid += ' <th><b>Tipo de Operação</b></th>';
        grid += ' <th><b>Situação da Demanda</b></th>';
        grid += ' <th><b>Usuario</b></th>';
        grid += '</tr></thead><tbody>';
        for (i=0;i<dados.length;i++){
            grid += '<tr>';
            grid += ' <td>'+dados[i].DTA_OPERACAO+'</td>';
            grid += ' <td>'+dados[i].TPO_OPERACAO+'</td>';
            grid += ' <td>'+dados[i].DSC_SITUACAO+'</td>';
            grid += ' <td>'+dados[i].NME_USUARIO+'</td>';
            grid += '</tr>';
        }
        grid += '</tbody>';
        grid += '</table>';
        $("#tabelaHistorico").html(grid);
        $("#historicoDemanda").modal("show");
        $('#tbHistorico').DataTable({
            "filter": false,
            "ordering": false,
            "language": {
                "emptyTable": "Nenhum registro encontrado",
                "info": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                "infoEmpty": "Mostrando 0 até 0 de 0 registros",
                "infoFiltered": "(Filtrados de _MAX_ registros)",
                "infoPostFix": "",
                "infoThousands": ".",
                "lengthMenu": "_MENU_ resultados por página",
                "loadingRecords": "Carregando...",
                "processing": "Processando...",
                "zeroRecords": "Nenhum registro encontrado",
                "search": "Pesquisar: ",
                "paginate": {
                    "next": "Próximo",
                    "previous": "Anterior",
                    "first": "Primeiro",
                    "last": "Último"
                },
                "aria": {
                    "sortAscending": ": Ordenar colunas de forma ascendente",
                    "sortDescending": ": Ordenar colunas de forma descendente"
                }
            }
        });
        }else{
            swal({
            title: "Aviso!",
            text: "Sem dados para essa demanda!",
            type: "info",
            confirmButtonText: "Fechar"
            });
        }
    } 
}

function montaComboTpoDemanda(dados){
    if(dados[0]){
        dados = dados[1];
         combo = '<select id="comboTpoDemanda" class="btn btn-outline-secondary dropdown-toggle">';
         combo += '<option value="" disabled selected hidden>Selecione um status</option>';
         combo += '<option value="0"> TODOS </option>';
        for (i=0;i<dados.length;i++){
            combo += '<option value="'+dados[i].COD_SITUACAO+'">'+dados[i].DSC_SITUACAO+'</option>';
        }
        combo +='</select>';
        $("#divComboTpoDemanda").html(combo);
        $("#comboTpoDemanda").val($("#codSituacao").val());
        if($("#codSituacao").val() !=''){
            $("#btnPesquisarDemanda").click();
        }
    }
}

$(document).ready(function() {
    ExecutaDispatch('Situacao', 'ListarSituacao', undefined, montaComboTpoDemanda);
    $("#updateDemanda").on('show.bs.modal', function (e) {
        if($("#codDemanda").val() == ''){
            $("#btnHistorico").hide();
            $("#btnDescricao").hide();
            $("#btnArquivos").hide();
        }else{
            $("#btnHistorico").show();
            $("#btnDescricao").show();
            $("#btnArquivos").show();
        }
    });
} );