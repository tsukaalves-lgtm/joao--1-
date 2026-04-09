<?php
require_once 'Conexao.php';
require_once 'UtilDAO.php';

class CategoriaDAO extends Conexao {
    public function CadastrarCategoria($nome) {
        if (empty($nome)) return 0;
        $sql = parent::retornarConexao()->prepare("INSERT INTO tb_categoria (nome_categoria, id_usuario) VALUES (?, ?)");
        $sql->execute([$nome, UtilDAO::CodigoLogado()]);
        return 1;
    }
    public function ConsultarCategoria() {
        $sql = parent::retornarConexao()->prepare("SELECT id_categoria, nome_categoria FROM tb_categoria WHERE id_usuario = ? ORDER BY nome_categoria ASC");
        $sql->execute([UtilDAO::CodigoLogado()]);
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function DetalharCategoria($id) {
        $sql = parent::retornarConexao()->prepare("SELECT id_categoria, nome_categoria FROM tb_categoria WHERE id_categoria = ? AND id_usuario = ?");
        $sql->execute([$id, UtilDAO::CodigoLogado()]);
        return $sql->fetch(PDO::FETCH_ASSOC);
    }
    public function AlterarCategoria($id, $nome) {
        if (empty($nome)) return 0;
        $sql = parent::retornarConexao()->prepare("UPDATE tb_categoria SET nome_categoria = ? WHERE id_categoria = ? AND id_usuario = ?");
        $sql->execute([$nome, $id, UtilDAO::CodigoLogado()]);
        return 1;
    }
    public function ExcluirCategoria($id) {
        try {
            $sql = parent::retornarConexao()->prepare("DELETE FROM tb_categoria WHERE id_categoria = ? AND id_usuario = ?");
            $sql->execute([$id, UtilDAO::CodigoLogado()]);
            return 1;
        } catch (Exception $e) { return -4; }
    }
}