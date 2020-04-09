<?php

namespace app;

class Controller
{
    public static function home()
    {
        require "app/views/home.php";        
    }

    public static function user()
    {        
        require "app/views/user.php"; 
    }

    public static function consultar()
    {
        $consulta = Db::consultar('consultar');
        $consultar = file_get_contents("app/views/consultar.html");
        $saida = str_replace('{{consultar}}', $consulta, $consultar);
        return $saida;
    }

    public static function inserir()
    {
        $consulta = Db::consultar('inserir');
        $inserir = file_get_contents("app/views/inserir.html");
        $saida = str_replace('{{consultar}}', $consulta, $inserir);
        return $saida;
    }
    public static function apagar()
    {
        $consulta = Db::consultar('apagar');
        $apagar = file_get_contents("app/views/apagar.html");
        $saida = str_replace('{{consultar}}', $consulta, $apagar);
        return $saida;
    }
    public static function alterar()
    {
        $consulta = Db::consultar('alterar');
        $alterar = file_get_contents("app/views/alterar.html");
        $saida = str_replace('{{consultar}}', $consulta, $alterar);
        return $saida;
    }
    public static function login()
    {
        require "app/views/login.php";
    }
    public static function sair()
    {
        setcookie('scpf', "", time() - 1, "/");
        $_SESSION['snome'] = null;
        unset($_SESSION['snome']);
        session_destroy();
        print "<script>window.location.href='./'</script>";
    }
    public static function erro()
    {
        return file_get_contents("app/views/erro.html");
    }
}
