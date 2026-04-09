<?php
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', ''); 
define('DB', 'db_financeiro_sex_1830');

class Conexao {
    private static $Connect;

    private static function Conectar() {
        try {
            if (self::$Connect == null) {
                $dsn = 'mysql:host=' . HOST . ';dbname=' . DB;
                self::$Connect = new PDO($dsn, USER, PASS);
                self::$Connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
        } catch (PDOException $e) {
            die("Erro na conexão: " . $e->getMessage());
        }
        return self::$Connect;
    }

    public static function retornarConexao() {
        return self::Conectar();
    }
}