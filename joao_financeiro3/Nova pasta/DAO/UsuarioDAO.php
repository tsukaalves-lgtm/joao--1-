<?php
require_once 'Conexao.php';
require_once 'UtilDAO.php';

class UsuarioDAO extends Conexao {
    public function ValidarLogin($email, $senha) {
        if (empty($email) || empty($senha)) return 0;
        $conexao = parent::retornarConexao();
        $sql = $conexao->prepare("SELECT id_usuario, nome_usuario FROM tb_usuario WHERE email_usuario = ? AND senha_usuario = ?");
        $sql->execute([$email, $senha]);
        $user = $sql->fetchAll(PDO::FETCH_ASSOC);
        if (count($user) == 0) return -6;
        UtilDAO::CriarSessao($user[0]['id_usuario'], $user[0]['nome_usuario']);
        header('location: inicial.php');
        exit;
    }
}