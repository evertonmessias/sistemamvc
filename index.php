<?php

namespace app;

require "vendor/autoload.php";
require "./app/public/head.html";
if (count(explode("/", @$_GET['url'])) != 1) {
    header("Location:" . Sistema::path());
} else {
    $controller = new Controller;
    if (!Sistema::sessao()) {
        $controller->login();
    } else {
        $saida = new Routes();
        $pre_content = file_get_contents("./app/public/nav_content.html");
        $content = str_replace("{{conteudo}}", $saida->route(@$_GET['url']), $pre_content);
        print $content;
    }
}
