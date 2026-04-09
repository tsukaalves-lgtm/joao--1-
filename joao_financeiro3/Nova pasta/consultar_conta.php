<?php
require_once './DAO/UtilDAO.php';
UtilDAO::VerificarLogado();
require_once './DAO/ContaDAO.php';

$dao = new ContaDAO();
$contas = $dao->ConsultarConta();
?>
<!DOCTYPE html>
<html>
<head><?php include_once '_head.php'; ?></head>
<body>
    <div id="wrapper">
        <?php include_once '_topo.php'; include_once '_menu.php'; ?>
        <div id="page-wrapper">
            <div id="page-inner">
                <h2>Consultar Contas</h2>
                <hr />
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Banco</th>
                                <th>Agência</th>
                                <th>Número</th>
                                <th>Saldo</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($contas as $item): ?>
                            <tr>
                                <td><?= $item['banco_conta'] ?></td>
                                <td><?= $item['agencia_conta'] ?></td>
                                <td><?= $item['numero_conta'] ?></td>
                                <td>R$ <?= number_format($item['saldo_conta'], 2, ',', '.') ?></td>
                                <td>
                                    <a href="alterar_conta.php?cod=<?= $item['id_conta'] ?>" class="btn btn-warning btn-xs">Alterar</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>