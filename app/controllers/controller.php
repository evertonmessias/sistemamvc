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
        require "app/views/consultar.php";
    }

    public static function inserir()
    {       
        require "app/views/inserir.php";
    }
    public static function apagar()
    {      
        require "app/views/apagar.php";
    }
    public static function alterar()
    {
        require "app/views/alterar.php";        
    }
    public static function login()
    {
        require "app/views/login.php";
    }
    public static function sair()
    {
        setcookie('snome', "", time() - 1, "/");
        $_SESSION['snome'] = null;
        $_SESSION['gnome'] = null;
        unset($_SESSION['snome']);
        unset($_SESSION['gnome']);
        session_destroy();
        print "<script>window.location.href='./'</script>";
    }
    public static function erro()
    {
        return file_get_contents("app/views/erro.php");
    }
}
