<?php
class UtilDAO {
    public static function CriarSessao($id, $nome) {
        if (!isset($_SESSION)) session_start();
        $_SESSION['cod'] = $id;
        $_SESSION['nome'] = $nome;
    }

    public static function CodigoLogado() {
        self::VerificarLogado();
        return $_SESSION['cod'];
    }

    public static function Deslogar() {
        if (!isset($_SESSION)) session_start();
        unset($_SESSION['cod']);
        unset($_SESSION['nome']);
        header('location: index_login.php');
        exit;
    }

    public static function VerificarLogado() {
        if (!isset($_SESSION)) session_start();
        if (!isset($_SESSION['cod']) || $_SESSION['cod'] == '') {
            header('location: index_login.php');
            exit;
        }
    }
}