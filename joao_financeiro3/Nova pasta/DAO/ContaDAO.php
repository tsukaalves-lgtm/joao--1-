<?php
require_once 'Conexao.php';
require_once 'UtilDAO.php';

class ContaDAO extends Conexao {
    public function CadastrarConta($banco, $agencia, $numero, $saldo) {
        $sql = parent::retornarConexao()->prepare("INSERT INTO tb_conta (banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario) VALUES (?, ?, ?, ?, ?)");
        $sql->execute([$banco, $agencia, $numero, $saldo, UtilDAO::CodigoLogado()]);
        return 1;
    }
    public function ConsultarConta() {
        $sql = parent::retornarConexao()->prepare("SELECT id_conta, banco_conta, agencia_conta, numero_conta, saldo_conta FROM tb_conta WHERE id_usuario = ?");
        $sql->execute([UtilDAO::CodigoLogado()]);
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function AlterarConta($id, $banco, $agencia, $numero, $saldo) {
        $sql = parent::retornarConexao()->prepare("UPDATE tb_conta SET banco_conta=?, agencia_conta=?, numero_conta=?, saldo_conta=? WHERE id_conta=? AND id_usuario=?");
        $sql->execute([$banco, $agencia, $numero, $saldo, $id, UtilDAO::CodigoLogado()]);
        return 1;
    }
}