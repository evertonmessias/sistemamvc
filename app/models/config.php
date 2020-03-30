<?php
namespace app;
abstract class Sistema
{
    public static $tabela1 = 'pessoas';
    public static $servidor = 'localhost';
    public static $usuario = 'root';
    public static $senha = 'efc2505xx';
    public static $banco = 'teste';

    public static function conexao()
    {
        return new \mysqli(self::$servidor, self::$usuario, self::$senha, self::$banco);
    }

    public static function sessao()
    {
        session_start();
        if (!isset($_SESSION['snome'])) {
            return false;
        }else{
            return true;
        }
    }
}
