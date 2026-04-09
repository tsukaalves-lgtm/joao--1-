<?php
require_once './DAO/UtilDAO.php';
UtilDAO::VerificarLogado();
require_once './DAO/ContaDAO.php';

$ret = null;
if (isset($_POST['btnSalvar'])) {
    $banco = $_POST['banco'];
    $agencia = $_POST['agencia'];
    $numero = $_POST['numero'];
    $saldo = $_POST['saldo'];
    $obj = new ContaDAO();
    $ret = $obj->CadastrarConta($banco, $agencia, $numero, $saldo);
}
?>
<!DOCTYPE html>
<html>
<head><?php include_once '_head.php'; ?></head>
<body>
    <div id="wrapper">
        <?php include_once '_topo.php'; ?>
        <?php include_once '_menu.php'; ?>
        <div id="page-wrapper">
            <div id="page-inner">
                <h2>Nova Conta</h2>
                <?php include_once '_msg.php'; ?>
                <form method="post" action="nova_conta.php">
                    <div class="form-group">
                        <label>Nome do Banco</label>
                        <input class="form-control" name="banco" placeholder="Ex: Bradesco" />
                    </div>
                    <div class="form-group">
                        <label>Agência</label>
                        <input class="form-control" name="agencia" placeholder="Digite a agência..." />
                    </div>
                    <div class="form-group">
                        <label>Número da Conta</label>
                        <input class="form-control" name="numero" placeholder="Digite o número da conta..." />
                    </div>
                    <div class="form-group">
                        <label>Saldo</label>
                        <input class="form-control" name="saldo" placeholder="Ex: 100.00" />
                    </div>
                    <button type="submit" name="btnSalvar" class="btn btn-success">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>