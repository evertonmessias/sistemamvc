<?php
namespace app;
class Core
{
    public function start($urlGet)
    {
        $acao = "index";
        $controller = @$urlGet['p'];
        switch ($controller) {
            case '':
                call_user_func(array(new Home, $acao), array());
                break;
            case 'inserir':
                call_user_func(array(new Inserir, $acao), array());
                break;
            case 'apagar':
                call_user_func(array(new Apagar, $acao), array());
                break;
            case 'alterar':
                call_user_func(array(new Alterar, $acao), array());
                break;
            case 'contatos':
                call_user_func(array(new Contatos, $acao), array());
                break;
            case 'sair':
                call_user_func(array(new Sair, $acao), array());
                break;
            default:
                call_user_func(array(new Erro, $acao), array());
                break;
        }
        // chama métodos dinamicamente
    }
}
