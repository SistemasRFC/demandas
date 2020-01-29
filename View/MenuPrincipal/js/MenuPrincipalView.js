function carregaGridDemandasPendentes(){
    ExecutaDispatch('Demandas', 'ListarDemandasPendentes', undefined, montaGridDemandasPendentes);
}

function montaGridDemandasPendentes(dados){
   if(dados[0]){
        if(dados[1] !== null){
            dados = dados[1];
            var grid = '<table id="tbDemandasP" class="display" style="width:100%">';
            grid += '<thead><tr>';
            grid += ' <th width="3%"><b>Número</b></th>';
            grid += ' <th width="35%"><b>Demanda</b></th>';
            grid += ' <th width="8%"><b>Sistema</b></th>';
            grid += ' <th width="3%"><b>Prioridade</b></th>';
            grid += ' <th width="3%"><b>Ação</b></th>';
            grid += '</tr></thead><tbody>';
            for (i=0;i<dados.length;i++){
                grid += '<tr>';
                grid += ' <td>'+dados[i].COD_DEMANDA+'</td>';
                grid += ' <td>'+dados[i].DSC_DEMANDA+'</td>';
                grid += ' <td>'+dados[i].NME_SISTEMA+'</td>';
                grid += ' <td align="center">'+dados[i].DSC_PRIORIDADE+'</td>';
                grid += " <td><a href=\"javascript:openDescDemandas("+dados[i].COD_DEMANDA+");\">Vizualizar</a></td>";
                grid += '</tr>';
            }
            grid += '</tbody>';
            grid += '</table>';
            $("#tbDemandasPendentes").html(grid);
            $('#tbDemandasP').DataTable({
                "filter": false,
                "ordering": false,
                "info": false,
                "paginate": false,
                "scrollY": "200px",
                "scrollCollapse": true,
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
            var grid = 'Sem dados!';            
            $("#tbDemandasPendentes").html(grid);
        }
   } 
}

function openDescDemandas(cadDemanda){
    $('#codDemanda').val(cadDemanda);
    carregaGridDescricao();
    $("#descricaoDemanda").modal("show");
    
}

function carregaGridDemandasUsuario(){
    ExecutaDispatch('Demandas', 'ListarDemandasUsuario', undefined, montaGridDemandasUsuario);
}

function montaGridDemandasUsuario(dados){
   if(dados[0]){
        if(dados[1] !== null){
            dados = dados[1];
            var grid = '<table id="tbDemandasU" class="display" style="width:100%">';
            grid += '<thead><tr>';
            grid += ' <th><b>Número</b></th>';
            grid += ' <th><b>Demanda</b></th>';
            grid += ' <th><b>Sistema</b></th>';
            grid += ' <th><b>Responsável</b></th>';
            grid += ' <th><b>Status</b></th>';
            grid += '</tr></thead><tbody>';
            for (i=0;i<dados.length;i++){
                grid += '<tr>';
                grid += ' <td>'+dados[i].COD_DEMANDA+'</td>';
                grid += ' <td>'+dados[i].DSC_DEMANDA+'</td>';
                grid += ' <td>'+dados[i].NME_SISTEMA+'</td>';
                grid += ' <td>'+dados[i].NME_USUARIO_COMPLETO+'</td>';
                grid += ' <td>'+dados[i].DSC_SITUACAO+'</td>';
                grid += '</tr>';
            }
            grid += '</tbody>';
            grid += '</table>';
            $("#tbDemandasUsuario").html(grid);
            $('#tbDemandasU').DataTable({
                "filter": false,
                "ordering": false,
                "info": false,
                "paginate": false,
                "scrollY": "200px",
                "scrollCollapse": true,
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
            var grid = 'Sem dados!';            
            $("#tbDemandasUsuario").html(grid);
        }
        
    } 
}

function carregaGridContagemStatus(){
    ExecutaDispatch('Demandas', 'ContagemDemandasStatus', undefined, montaGridContagemStatus);
}

function montaGridContagemStatus(dados){
   if(dados[0]){
        dados = dados[1];
        var grid = '<table id="tdContagemStatus" class="display" style="width:100%">';
        grid += '<thead><tr>';
        grid += ' <th><b>Por Status</b></th>';
        grid += ' <th></th>';
        grid += '</tr></thead><tbody>';
        for (i=0;i<dados.length;i++){
            grid += '<tr>';
//            grid += " <td><a href=\"../Demandas/DemandasView.php?codSituacao="+dados[i].COD_SITUACAO+"\">"+dados[i].DSC_SITUACAO+"</a></td>";
            grid += " <td><a href=\"javascript:RedirecionaView('Demandas', 'ChamaViewSituacao', "+dados[i].COD_SITUACAO+");\">"+dados[i].DSC_SITUACAO+"</a></td>";
            grid += ' <td>'+dados[i].QTD+'</td>';
            grid += '</tr>';
        }
        grid += '</tbody>';
        grid += '</table>';
        $("#tbContagemStatus").html(grid);
        $('#tdContagemStatus').DataTable({
            "filter": false,
            "ordering": false,
            "info": false,
            "paginate": false,
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
   } 
}

function carregaGridContagemPrioridade(){
    ExecutaDispatch('Demandas', 'ContagemDemandasPrioridade', undefined, montaGridContagemPrioridade);
}

function montaGridContagemPrioridade(dados){
   if(dados[0]){
        dados = dados[1];
        var grid = '<table id="tdContagemPrioridade" class="display" style="width:100%">';
        grid += '<thead><tr>';
        grid += ' <th><b>Por Prioridade</b></th>';
        grid += ' <th></th>';
        grid += '</tr></thead><tbody>';
        for (i=0;i<dados.length;i++){
            grid += '<tr>';
            grid += ' <td>'+dados[i].DSC_PRIORIDADE+'</td>';
            grid += ' <td>'+dados[i].QTD+'</td>';
            grid += '</tr>';
        }
        grid += '</tbody>';
        grid += '</table>';
        $("#tbContagemPrioridade").html(grid);
        $('#tdContagemPrioridade').DataTable({
            "filter": false,
            "ordering": false,
            "info": false,
            "paginate": false,
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
   } 
}

function montaGridContagemTotal(dados){
   if(dados[0]){
        dados = dados[1];
        var grid = '<table id="tdContagemTotal" class="compact" style="width:100%; aling:center;">';
        grid += '<thead><tr>';
        grid += ' <th class="dt-head-center"><b>Total de Demandas</b></th>';
        grid += '</tr></thead><tbody>';
        for (i=0;i<dados.length;i++){
            grid += '<tr>';
            grid += ' <td align="center">'+dados[i].QTD_TOTAL+'</td>';
            grid += '</tr>';
        }
        grid += '</tbody>';
        grid += '</table>';
        $("#tbContagemTotal").html(grid);
        $('#tdContagemTotal').DataTable({
            "filter": false,
            "ordering": false,
            "info": false,
            "paginate": false,
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
   } 
}

$(document).ready(function() {
    carregaGridDemandasPendentes();
    carregaGridDemandasUsuario();
    carregaGridContagemStatus();
    carregaGridContagemPrioridade();
    ExecutaDispatch('Demandas', 'ContagemDemandasTotal', undefined, montaGridContagemTotal);
} );