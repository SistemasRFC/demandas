var dadosListagem;
$(function() {
    $("#btnNovoUsuario").click(function(){
        $("#codUsuario").val('');
        $("#nmeUsuario").val('');
        $("#txtEmail").val('');
        $("#nroCelular").val('');
        $("#txtLogin").val('');
        $("#comboPerfil").val('');
        $("#indAtivo").attr('checked', false);
        $("#btnReiniciaSenha").hide();
        $("#cadUsuario").modal("show");
    });
    $("#btnVoltar").click(function(){
        listaComboSistemas();
    })
});

function carregaGridUsuario(){
    ExecutaDispatch('Usuario', 'ListarUsuario', undefined, montaGridUsuario);
}

function montaGridUsuario(dados){
    if(dados[0]){
        var tabela = '<table id="tbUsuario" class="table table-striped">';
        tabela += '<thead>';
        tabela += '<tr>';
        tabela += '<th>Código</th>';
        tabela += '<th>Usuário</th>';
        tabela += '<th>Login</th>';
        tabela += '<th>Perfil</th>';
        tabela += '<th>Ativo</th>';
        tabela += '<th>Ação</th>';
        tabela += '</tr>';
        tabela += '</thead>';
        tabela += '<tbody>';
        if(dados[1] !== null){
            dadosListagem = dados[1];
            dados = dados[1];
            for (i=0;i<dados.length;i++){
                var indAtivo = dados[i].IND_ATIVO=="S"?"Sim":"Não";
                tabela += '<tr>';
                tabela += '<td>'+dados[i].COD_USUARIO+'</td>';
                tabela += '<td>'+dados[i].NME_USUARIO_COMPLETO+'</td>';
                tabela += '<td>'+dados[i].NME_USUARIO+'</td>';
                tabela += '<td>'+dados[i].DSC_PERFIL+'</td>';
                tabela += '<td>'+indAtivo+'</td>';
                tabela += ' <td>';
                tabela += '   <button class="btn btn-link" title="Editar" onClick="javascript:carregaCamposUsuario('+i+');">';
                tabela += '       <i class="fa-solid fa-pencil"></i>';
                tabela += '   </button>';
                tabela += ' </td>';
                tabela += '</tr>';

            }
        }
        tabela += '</tbody>';
        tabela += '</table>';
        $("#tabelaUsuario").html(tabela);
        criarDataTable("tbUsuario");
    }
}

$(document).ready(function(){
    carregaGridUsuario();
});