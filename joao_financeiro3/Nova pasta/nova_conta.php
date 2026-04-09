<?php
require_once './DAO/UtilDAO.php';
UtilDAO::VerificarLogado();
require_once './DAO/ContaDAO.php';

if (isset($_POST['btnSalvar'])) {
    $banco = $_POST['banco'];
    $agencia = $_POST['agencia'];
    $numero = $_POST['numero'];
    $saldo = $_POST['saldo'];
    $dao = new ContaDAO();
    $ret = $dao->CadastrarConta($banco, $agencia, $numero, $saldo);
}
?>
<!DOCTYPE html>
<html>
<head><?php include_once '_head.php'; ?></head>
<body>
    <div id="wrapper">
        <?php include_once '_topo.php'; include_once '_menu.php'; ?>
        <div id="page-wrapper">
            <div id="page-inner">
                <h2>Nova Conta</h2>
                <form method="post" action="nova_conta.php">
                    <div class="form-group">
                        <label>Banco</label>
                        <input class="form-control" name="banco" required />
                    </div>
                    <div class="form-group">
                        <label>Agência</label>
                        <input class="form-control" name="agencia" required />
                    </div>
                    <div class="form-group">
                        <label>Número da Conta</label>
                        <input class="form-control" name="numero" required />
                    </div>
                    <div class="form-group">
                        <label>Saldo Inicial</label>
                        <input class="form-control" name="saldo" placeholder="Ex: 1500.00" required />
                    </div>
                    <button type="submit" name="btnSalvar" class="btn btn-success">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>