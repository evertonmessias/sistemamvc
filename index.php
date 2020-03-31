<?php

namespace app;

require __DIR__."/vendor/autoload.php";
require __DIR__."/app/public/html/head.html";

if (count(explode("/", @$_GET['url'])) != 1) {
    header("Location:" . Sistema::domain());
} else {
    $controller = new Controller;
    if (!Sistema::sessao()) {
        $controller->login();
    } else {
        $saida = new Routes();
        $pre_content = file_get_contents(__DIR__."/app/public/html/nav_content.html");
        $content = str_replace("{{conteudo}}", $saida->route(@$_GET['url']), $pre_content);
        print $content;
    }
}
