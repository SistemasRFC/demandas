<?php
if (!isset($_SESSION)) {
    ob_start();
    session_start();
}
if(!$_SESSION['cod_usuario']) {
    header('location: ../../index.php');
}
?>

<script src="../../View/MenuPrincipal/js/Cabecalho.js?rdm=<?php echo time(); ?>"></script>

<nav class="bg-color-white navbar navbar-expand navbar-light topbar static-top">
    <input type="hidden" id="codUsuarioSessao">
    
    <a class="sidebar-brand color-primary d-flex align-items-center justify-content-center" href="../../../demandas/View/MenuPrincipal/MenuPrincipalView.php">
        <div class="sidebar-brand-icon">
            <i class="fa-solid fa-layer-group"></i>
        </div>
        <div class="sidebar-brand-text mx-3 h4">Demandas - Sistema de apoio ao desenvolvimento</div>
    </a>
    
    <ul class="navbar-nav ml-auto">
        <div class="topbar-divider d-none d-sm-block"></div>
        
        <li class="pt-2">
            <span class="mr-2 d-none d-lg-inline" id="usuSessao"></span>
            <a href="../../index.php" title="Sair">
                <i class="icon fas fa-sign-out-alt text-gray-800"></i>
            </a>
        </li>
    </ul>        
</nav>
<nav class="bg-color-primary navbar navbar-expand navbar-dark mb-4 static-top">
    <ul class="navbar-nav" id="MenuNavegacao"></ul>
</nav>