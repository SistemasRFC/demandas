var listaMenus;
function carregarListaMenus(){
    ExecutaDispatch('Menu', 'CarregaMenu', undefined, MontaGrid);
}

function MontaGrid(dados){
    if (dados[0]){
        var tabela = '<table id="tbMenu" class="table table-striped">';
        tabela += '<thead>';
        tabela += '<tr>';
        tabela += '<th>Menu</th>';
        tabela += '<th>Controller</th>';
        tabela += '<th>Método</th>';
        tabela += '<th>Ativo</th>';
        tabela += '<th>Visível</th>';
        tabela += '<th>Ações</th>';
        tabela += '</tr>';
        tabela += '</thead>';
        tabela += '<tbody>';
        if(dados[1]!=null) {
            listaMenus = dados[1];
            dados = dados[1];
            for (i=0;i<dados.length;i++){
                var indAtivo = dados[i].IND_ATIVO=="S"?"Sim":"Não"
                var indVisivel = dados[i].IND_VISIBLE=="S"?"Sim":"Não"
                tabela += '<tr>';
                tabela += '<td>'+dados[i].DSC_MENU+'</td>';
                tabela += '<td>'+dados[i].NME_CONTROLLER+'</td>';
                tabela += '<td>'+dados[i].NME_METHOD+'</td>';
                tabela += '<td>'+indAtivo+'</td>';
                tabela += '<td>'+indVisivel+'</td>';
                tabela += ' <td>';
                tabela += '   <button class="btn btn-link" title="Editar" onClick="javascript:editarMenu('+i+');">';
                tabela += '       <i class="fa-solid fa-pencil"></i>';
                tabela += '   </button>';
                tabela += ' </td>';
                tabela += '</tr>';
            }
        }
        tabela += '</tbody>';
        tabela += '</tbody>';
        tabela += '</table>';
        $("#ListaMenus").html(tabela);
        criarDataTable("tbMenu");
    }
}

function editarMenu(indice){
    carregaCampos(listaMenus[indice]);
}

function carregaCampos(dados){
    $("#codMenu").val(dados.COD_MENU);
    $("#dscMenu").val(dados.DSC_MENU);
    $("#nmeController").val(dados.NME_CONTROLLER);
    $("#nmeMethod").val(dados.NME_METHOD);
    $("#codMenuPai").val(dados.COD_MENU_PAI);
    $("#indAtivo").prop('checked', dados.ATIVO);
    $("#indVisible").prop('checked', dados.VISIBLE);
    $("#cadastroMenuTitle").html('Editar Menu');
    $("#cadastroMenu").modal('show');
}

function limparCampos(){
    $("#cadastroMenu").modal('show');
    $("#codMenu").val('');
    $("#dscMenu").val('');
    $("#nmeController").val('');
    $("#nmeMethod").val('');
    $("#codMenuPai").val('');
    $("#indAtivo").prop('checked', false);
    $("#indVisible").prop('checked', false); 
}

$(document).ready(function(){
    carregarListaMenus();
    $("#btnNovoMenu").click(function(){
        limparCampos();
        $("#cadastroMenuTitle").html('Incluir Menu');
        $("#cadastroMenu").modal('show');
    });
});