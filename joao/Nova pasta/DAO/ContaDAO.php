<?php
require_once 'Conexao.php';
require_once 'UtilDAO.php';

class ContaDAO extends Conexao {
    public function ConsultarConta() {
        $conexao = parent::retornarConexao();
        $sql = $conexao->prepare("SELECT id_conta, banco_conta, agencia_conta, numero_conta, saldo_conta FROM tb_conta WHERE id_usuario = ? ORDER BY banco_conta ASC");
        $sql->execute([UtilDAO::CodigoLogado()]);
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}