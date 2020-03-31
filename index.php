<?php
namespace app;
require "vendor/autoload.php";
require "./app/public/head.html";
$controller = new Controller;
$saida = new Routes();
$pag = $saida->route(@$_GET['url']);
if($pag){
    $pre_content = file_get_contents("./app/public/nav_content.html");
    $content = str_replace("{{conteudo}}", $pag , $pre_content);
    print $content;
}else{
    $controller->login();
}