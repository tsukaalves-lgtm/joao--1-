<?php
require_once 'Conexao.php';
require_once 'UtilDAO.php';

class EmpresaDAO extends Conexao {
    public function ConsultarEmpresa() {
        $conexao = parent::retornarConexao();
        $sql = $conexao->prepare("SELECT id_empresa, nome_empresa, telefone_empresa, endereco_empresa FROM tb_empresa WHERE id_usuario = ? ORDER BY nome_empresa ASC");
        $sql->execute([UtilDAO::CodigoLogado()]);
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}