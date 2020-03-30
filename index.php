<?php
namespace app;
require "vendor/autoload.php";
require "./app/public/head.html";
$sessao = Sistema::sessao();
$controller = new Controller;
$saida = new Routes();
if (!$sessao) {   
    $controller->login();
} else {
    $pre_content = file_get_contents("./app/public/nav_content.html");
    $content = str_replace("{{conteudo}}", $saida->route(@$_GET['url']) , $pre_content);
    print $content;
}