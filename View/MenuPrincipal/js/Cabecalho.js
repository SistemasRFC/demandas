function carregaDadosUsuario(){
    $.post('../../Dispatch.php', {
        controller: 'MenuPrincipal',
        method: 'CarregaDadosUsuario'
    }, function(result){
        result = eval('('+result+')');
        if (result[0]) {
            $("#codUsuarioSessao").val(result[1][0].COD_USUARIO);
            localStorage.setItem("codUsuario", result[1][0].COD_USUARIO);
            $("#usuSessao").html(''+result[1][0].NME_USUARIO_COMPLETO);
        }
    });    
}

function CarregaMenu(){
    $.post('../../Dispatch.php',
           {
               method: 'CarregaMenu',
               controller: 'MenuPrincipal'
           },
           function(retorno){
                retorno = eval ('('+retorno+')');
                if (retorno[0]==true){
                    MontaMenu(retorno[1]);
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

function MontaMenu(Dados){
    var listaMenus = '<div class="collapse navbar-collapse">';
    listaMenus += '<ul class="navbar-nav mr-auto">';
    for(i=0;i<Dados.length;i++){
        if (parseInt(Dados[i].QTD_FILHOS)>0){
            listaMenus += '<li class="nav-item dropdown active">';
            listaMenus += '<a class="nav-link dropdown-toggle" href="#" id="Item'+Dados[i].COD_MENU+'" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'+Dados[i].DSC_MENU+'</a>';
            listaMenus += '<div class="dropdown-menu shadow" aria-labelledby="Item'+Dados[i].COD_MENU+'">';
            for (j=0;j<Dados.length;j++){
                if (Dados[i].COD_MENU == Dados[j].COD_MENU_PAI){
                    listaMenus += '<a class="dropdown-item" href="javascript:RedirecionaController(\''+Dados[j].NME_CONTROLLER+'\', \''+Dados[j].NME_METHOD+'\');">'+Dados[j].DSC_MENU+'</a>';
                }
            }
            listaMenus += '</div></li>';
        }else if (parseInt(Dados[i].QTD_FILHOS)==0 && (Dados[i].COD_MENU_PAI==0 || Dados[i].COD_MENU_PAI==-1)){
            if (Dados[i].NME_CONTROLLER!=null){
                listaMenus += '<li class="nav-item active"><a class="nav-link" href="javascript:RedirecionaController(\''+Dados[i].NME_CONTROLLER+'\', \''+Dados[i].NME_METHOD+'\');">'+Dados[i].DSC_MENU+'</a></li>';
            }else{
                listaMenus += '<li class="nav-item active"><a class="nav-link" href="#">'+Dados[i].DSC_MENU+'</a></li>';
            }
            
        }
    }
    listaMenus += '</ul>';
    listaMenus += '</div>';
    $("#MenuNavegacao").html(listaMenus);
}

$(document).ready(function(){
    CarregaMenu();
    carregaDadosUsuario();
});