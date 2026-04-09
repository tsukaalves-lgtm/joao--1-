<?php
require_once './DAO/UtilDAO.php';
UtilDAO::VerificarLogado();
require_once './DAO/MovimentoDAO.php';

$dt_inicial = '';
$dt_final = '';
$tipo = '';
$movimentos = [];

if (isset($_POST['btnPesquisar'])) {
    $tipo = $_POST['tipo'];
    $dt_inicial = $_POST['data_inicial'];
    $dt_final = $_POST['data_final'];

    $dao = new MovimentoDAO();
    $movimentos = $dao->ConsultarMovimento($tipo, $dt_inicial, $dt_final);
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php include_once '_head.php'; ?>
</head>
<body>
    <div id="wrapper">
        <?php include_once '_topo.php'; ?>
        <?php include_once '_menu.php'; ?>
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Consultar Movimento</h2>
                        <h5>Consulte seus lançamentos em um período determinado.</h5>
                    </div>
                </div>
                <hr />
                <form method="post" action="consultar_movimento.php">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Tipo de Movimento</label>
                            <select name="tipo" class="form-control">
                                <option value="0" <?= $tipo == '0' ? 'selected' : '' ?>>Todos</option>
                                <option value="1" <?= $tipo == '1' ? 'selected' : '' ?>>Entrada</option>
                                <option value="2" <?= $tipo == '2' ? 'selected' : '' ?>>Saída</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Data Inicial*</label>
                            <input type="date" name="data_inicial" value="<?= $dt_inicial ?>" class="form-control" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Data Final*</label>
                            <input type="date" name="data_final" value="<?= $dt_final ?>" class="form-control" required />
                        </div>
                    </div>
                    <center>
                        <button name="btnPesquisar" class="btn btn-info">Pesquisar</button>
                    </center>
                </form>
                <hr />
                <?php if (count($movimentos) > 0) : ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Data</th>
                                    <th>Tipo</th>
                                    <th>Categoria</th>
                                    <th>Empresa</th>
                                    <th>Conta</th>
                                    <th>Valor</th>
                                    <th>Observação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($movimentos as $m) : ?>
                                    <tr>
                                        <td><?= date('d/m/Y', strtotime($m['data_movimento'])) ?></td>
                                        <td><?= $m['tipo_movimento'] == 1 ? 'Entrada' : 'Sa