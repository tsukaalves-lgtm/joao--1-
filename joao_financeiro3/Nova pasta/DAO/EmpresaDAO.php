<?php
require_once 'Conexao.php';
require_once 'UtilDAO.php';

class EmpresaDAO extends Conexao {
    public function CadastrarEmpresa($nome, $tel, $end) {
        if (empty($nome)) return 0;
        $sql = parent::retornarConexao()->prepare("INSERT INTO tb_empresa (nome_empresa, telefone_empresa, endereco_empresa, id_usuario) VALUES (?, ?, ?, ?)");
        $sql->execute([$nome, $tel, $end, UtilDAO::CodigoLogado()]);
        return 1;
    }
    public function ConsultarEmpresa() {
        $sql = parent::retornarConexao()->prepare("SELECT id_empresa, nome_empresa, telefone_empresa, endereco_empresa FROM tb_empresa WHERE id_usuario = ?");
        $sql->execute([UtilDAO::CodigoLogado()]);
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function AlterarEmpresa($id, $nome, $tel, $end) {
        $sql = parent::retornarConexao()->prepare("UPDATE tb_empresa SET nome_empresa = ?, telefone_empresa = ?, endereco_empresa = ? WHERE id_empresa = ? AND id_usuario = ?");
        $sql->execute([$nome, $tel, $end, $id, UtilDAO::CodigoLogado()]);
        return 1;
    }
}