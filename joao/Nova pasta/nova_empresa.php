<?php
require_once './DAO/UtilDAO.php';
UtilDAO::VerificarLogado();
require_once './DAO/EmpresaDAO.php';

$ret = null;
if (isset($_POST['btnSalvar'])) {
    $nome = $_POST['nome'];
    $tel = $_POST['tel'];
    $end = $_POST['end'];
    $obj = new EmpresaDAO();
    $ret = $obj->CadastrarEmpresa($nome, $tel, $end);
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
                <h2>Nova Empresa</h2>
                <?php include_once '_msg.php'; ?>
                <form method="post" action="nova_empresa.php">
                    <div class="form-group">
                        <label>Nome da Empresa</label>
                        <input class="form-control" name="nome" placeholder="Digite o nome da empresa..." />
                    </div>
                    <div class="form-group">
                        <label>Telefone</label>
                        <input class="form-control" name="tel" placeholder="Digite o telefone..." />
                    </div>
                    <div class="form-group">
                        <label>Endereço</label>
                        <input class="form-control" name="end" placeholder="Digite o endereço..." />
                    </div>
                    <button type="submit" name="btnSalvar" class="btn btn-success">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>