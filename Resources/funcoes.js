$(document).ready(function(){
    setInterval(function(){
        ExecutaDispatch('Login', 'estaAtivo', 'verificaPermissao<=>N');
        
    }, 240000);
});
function VerificaSessao(){
    $.post('../../Controller/MenuPrincipal/MenuPrincipalController.php', {
        async: false,
        method: 'VerificaSessao'}, function(result){
        result = eval('('+result+')');
        if (!result){            
            window.location.href='../../index.php';
        }else{
            CarregaMenu();
        }
    });
}

function RedirecionaController(Controller, Method){
    $(location).attr('href','../../Dispatch.php?controller='+Controller+'&method='+Method);
}

function RedirecionaView(Controller, Method, Parametro){
    $(location).attr('href','../../Dispatch.php?controller='+Controller+'&method='+Method+'&codSituacao='+Parametro+'&verificaPermissao=N');
}

function ExecutaDispatch(Controller, Method, Parametros, Callback){
    var obj = new Object();
    Object.defineProperty(obj, 'method', {
        __proto__: null,
        enumerable : true,
        configurable : true,
        value: Method
    });    
    Object.defineProperty(obj, 'controller', {
        __proto__: null,
        enumerable : true,
        configurable : true,
        value: Controller
    });        
    if (Parametros != undefined){
        var dados = Parametros.split('|'); 
        for (i=0;i<dados.length;i++){
            var campos = dados[i].split('<=>');
            Object.defineProperty(obj, campos[0], {
                                __proto__: null,
                                enumerable : true,
                                configurable : true,
                                value: campos[1] });
        }    
    }
    $.post('../../Dispatch.php',
        obj,
        function(retorno){
             retorno = eval ('('+retorno+')');
             if (retorno[0]==true){
                 if (Callback!=undefined){
                     Callback(retorno);
                 }
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
    );     
}

function CriarSelect(nmeCombo, arrDados, valor, disabled) {
    if (disabled == undefined) {
        disabled = false;
    }
    $("#td" + nmeCombo).html('');
    if (disabled == true) {
        var select = '<select id="' + nmeCombo + '" disabled class="persist form-control">';
    } else {
        var select = '<select id="' + nmeCombo + '" class="persist form-control">';
    }
    select += '<option value="-1">Selecione...</option>';
    for (i = 0; i < arrDados[1].length; i++) {
        if (arrDados[1][i]['ID'] == valor) {
            select += '<option value="' + arrDados[1][i]['ID'] + '" selected>' + arrDados[1][i]['DSC'] + '</option>';
        } else {
            select += '<option value="' + arrDados[1][i]['ID'] + '">' + arrDados[1][i]['DSC'] + '</option>';
        }
    }
    select += '</select>';
    $("#td" + nmeCombo).html(select);
}

function criarDataTableBasic(nmeTabela, scroll=false, altura=50) {
    if(scroll) {
        $("#"+nmeTabela).DataTable({
            "filter": false,
            "ordering": false,
            "info": false,
            "paging": false,
            "scrollCollapse": true,
            "scrollY": altura+'vh',
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
    } else {
        $("#"+nmeTabela).DataTable({
            "filter": false,
            "ordering": false,
            "info": false,
            "paging": false,
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

function criarDataTable(nmeTabela, orderColum=1) {
    $("#"+nmeTabela).DataTable({
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
        },
        "order": [[orderColum, 'asc']]
    });
}