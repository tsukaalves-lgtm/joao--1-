<?php
require_once 'Conexao.php';
require_once 'UtilDAO.php';

class CategoriaDAO extends Conexao {
    public function CadastrarCategoria($nome) {
        if (empty($nome)) return 0;
        $conexao = parent::retornarConexao();
        $sql = $conexao->prepare("INSERT INTO tb_categoria (nome_categoria, id_usuario) VALUES (?, ?)");
        $sql->execute([$nome, UtilDAO::CodigoLogado()]);
        return 1;
    }

    public function ConsultarCategoria() {
        $conexao = parent::retornarConexao();
        $sql = $conexao->prepare("SELECT id_categoria, nome_categoria FROM tb_categoria WHERE id_usuario = ? ORDER BY nome_categoria ASC");
        $sql->execute([UtilDAO::CodigoLogado()]);
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function DetalharCategoria($id) {
        $conexao = parent::retornarConexao();
        $sql = $conexao->prepare("SELECT id_categoria, nome_categoria FROM tb_categoria WHERE id_categoria = ? AND id_usuario = ?");
        $sql->execute([$id, UtilDAO::CodigoLogado()]);
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function AlterarCategoria($id, $nome) {
        if (empty($nome)) return 0;
        $conexao = parent::retornarConexao();
        $sql = $conexao->prepare("UPDATE tb_categoria SET nome_categoria = ? WHERE id_categoria = ? AND id_usuario = ?");
        $sql->execute([$nome, $id, UtilDAO::CodigoLogado()]);
        return 1;
    }
}