<?php
require_once './DAO/UtilDAO.php';
UtilDAO::VerificarLogado();
?>
<!DOCTYPE html>
<html>
<head><?php include_once '_head.php'; ?></head>
<body>
    <div id="wrapper">
        <?php include_once '_topo.php'; include_once '_menu.php'; ?>
        <div id="page-wrapper">
            <div id="page-inner">
                <h2>Painel Inicial</h2>
                <h5>Olá, <?php echo $_SESSION['nome']; ?>.</h5>
            </div>
        </div>
    </div>
</body>
</html>