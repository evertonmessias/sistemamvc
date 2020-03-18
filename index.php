<?php
namespace app; // busca de classes do autoload
require_once './vendor/autoload.php'; // uso das classes no autoload
include 'app/template/head.html';
Sistema::sessao();
Sistema::erro();
$nav_content = file_get_contents('app/template/nav_content.html');
ob_start(); // inicio captura do buffer navegador
$core = new Core;
$core->start($_GET);
$saida = ob_get_contents();
ob_end_clean(); // fim 
$conteudo = str_replace('{{conteudo}}',$saida,$nav_content);
echo $conteudo;
//comando: composer dumpautoload -o