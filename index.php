<?php

namespace app;
require "vendor/autoload.php";
require "./app/public/head.html";
$sessao = Sistema::sessao();
$controller = new Controller;
if (!$sessao) {   
    $controller->login();
} else {
    $action = @$_GET['url'];
    $pre_content = file_get_contents("./app/public/nav_content.html");
    if (!$action) $action = "home";
    if ((int) method_exists($controller, $action) == 1) $saida = $controller->$action();
    else $saida = $controller->pagne();
    $content = str_replace("{{conteudo}}", $saida, $pre_content);
    print $content;
}
