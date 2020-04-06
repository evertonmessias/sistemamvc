<?php
namespace app;

class Sistema
{
    public static $dsn = "".DB_DRIVER.":dbname=" . DB_DATABASE . ";host=" . DB_HOST . "";

    public static function conexao()
    {
	    return new \PDO(self::$dsn,DB_USERNAME,DB_PASSWORD);	    
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
    public static function domain(){
        return "http://".$_SERVER['SERVER_NAME'].dirname($_SERVER['PHP_SELF'])."/";
    }
}
