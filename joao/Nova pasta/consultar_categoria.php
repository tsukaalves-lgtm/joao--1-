<?php
require_once './DAO/UtilDAO.php';
UtilDAO::VerificarLogado();
require_once './DAO/CategoriaDAO.php';

$dao = new CategoriaDAO();
$categorias = $dao->ConsultarCategoria();
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
                <div class="row">
                    <div class="col-md-12">
                        <h2>Consultar Categorias</h2>
                        <h5>Consulte todas as suas categorias aqui.</h5>
                    </div>
                </div>
                <hr />
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nome da Categoria</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($categorias as $item): ?>
                                <tr>
                                    <td><?= $item['nome_categoria'] ?></td>
                                    <td>
                                        <a href="alterar_categoria.php?cod=<?= $item['id_categoria'] ?>" class="btn btn-warning btn-xs">Alterar</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>