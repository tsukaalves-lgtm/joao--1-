<?php
require_once './DAO/UtilDAO.php';
UtilDAO::VerificarLogado();
require_once './DAO/EmpresaDAO.php';

$dao = new EmpresaDAO();
$empresas = $dao->ConsultarEmpresa();
?>
<!DOCTYPE html>
<html>
<head>
    <?php include_once '_head.php'; ?>
</head>
<body>
    <div id="wrapper">
        <?php include_once '_topo.php'; ?>
        <?php include_once '_menu.php'; ?>
        <div id="page-wrapper">
            <div id="page-inner">
                <h2>Consultar Empresas</h2>
                <hr />
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Telefone</th>
                                <th>Endereço</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($empresas as $item): ?>
                            <tr>
                                <td><?= $item['nome_empresa'] ?></td>
                                <td><?= $item['telefone_empresa'] ?></td>
                                <td><?= $item['endereco_empresa'] ?></td>
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