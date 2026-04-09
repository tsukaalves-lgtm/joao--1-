<?php
require_once './DAO/UtilDAO.php';
UtilDAO::VerificarLogado();
require_once './DAO/CategoriaDAO.php';

$ret = null;
if (isset($_POST['btnSalvar'])) {
    $nome = $_POST['nome'];
    $obj = new CategoriaDAO();
    $ret = $obj->CadastrarCategoria($nome);
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
                <h2>Nova Categoria</h2>
                <?php include_once '_msg.php'; ?>
                <form method="post" action="nova_categoria.php">
                    <div class="form-group">
                        <label>Nome da Categoria</label>
                        <input class="form-control" name="nome" placeholder="Digite o nome da categoria..." />
                    </div>
                    <button type="submit" name="btnSalvar" class="btn btn-success">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>