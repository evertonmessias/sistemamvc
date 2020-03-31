<?php
namespace app;
abstract class Sistema
{
    public static $tabela0 = DB_TAB0;
    public static $tabela1 = DB_TAB1;
    public static $servidor = DB_HOST;
    public static $usuario = DB_USERNAME;
    public static $senha = DB_PASSWORD;
    public static $banco = DB_DATABASE;

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
    public static function path(){
        return "http://".$_SERVER['SERVER_NAME'].dirname($_SERVER['PHP_SELF'])."/";
    }
}
