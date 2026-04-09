<?php
// Note que agora está UtilDAO (sem o i)
require_once './DAO/UtilDAO.php';
UtilDAO::VerificarLogado();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php include_once '_head.php'; ?>
</head>
<body>
    <div id="wrapper">
        <?php 
            include_once '_topo.php'; 
            include_once '_menu.php'; 
        ?>
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Painel Inicial</h2>
                        <h5>Olá, <strong><?php echo $_SESSION['nome']; ?></strong>. Seja bem-vindo ao seu controle financeiro.</h5>
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-6">           
                        <div class="panel panel-back noti-box">
                            <span class="icon-box bg-color-green set-icon">
                                <i class="fa fa-desktop"></i>
                            </span>
                            <div class="text-box">
                                <p class="main-text">Início</p>
                                <p class="text-muted">Sistema Ativo</p>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
        </div>
    </div>
</body>
</html>