<?php

namespace app;

require "vendor/autoload.php";
require "app/public/html/head.html";

if (count(explode("/", @$_GET['url'])) != 1) {
    header("Location:" . Sistema::domain());
} else {
    if (!Sistema::sessao()) {
        Controller::login();
    } else {
        require "app/public/html/nav.html";
        $pre_content = file_get_contents("app/public/html/content.html");
        $content = str_replace("{{conteudo}}", Routes::route(@$_GET['url']), $pre_content);
        print $content;
    }
}
