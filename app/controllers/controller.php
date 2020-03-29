<?php

namespace app;

class Controller
{
    function home()
    {
        $nome = @$_SESSION['snome'];
        $home = file_get_contents("app/views/home.html");
        $saida = str_replace('{{nome}}', $nome, $home);
        return $saida;
    }
    function inserir()
    {
        $consulta = Db::consultar('consultar');
        $inserir = file_get_contents("app/views/inserir.html");
        $saida = str_replace('{{consultar}}', $consulta, $inserir);
        return $saida;
    }
    function apagar()
    {
        $consulta = Db::consultar('apagar');
        $apagar = file_get_contents("app/views/apagar.html");
        $saida = str_replace('{{consultar}}', $consulta, $apagar);
        return $saida;
    }
    function alterar()
    {
        $consulta = Db::consultar('alterar');
        $alterar = file_get_contents("app/views/alterar.html");
        $saida = str_replace('{{consultar}}', $consulta, $alterar);
        return $saida;
    }
    function contatos()
    {
        return file_get_contents("app/views/contatos.html");
    }
    function login()
    {
        require "app/views/login.html";
    }
    function sair()
    {
        $_SESSION['snome'] = null;
        unset($_SESSION['snome']);
        session_destroy();
        print "<script>window.location.href='./'</script>";
    }
    function pagne()
    {
        return file_get_contents("app/views/pagne.html");
    }
}
