<?php

namespace app;

require "vendor/autoload.php";
$head = file_get_contents("app/public/html/head.html");
print $head;

if (count(explode("/", @$_GET['url'])) != 1) {
    header("Location:" . Sistema::domain());
} else {
    if (!Sistema::sessao()) {
        Controller::login();
    } else {
        require "app/public/html/nav_content.html";
        print Routes::route(@$_GET['url']);
        require "app/public/html/footer.html";
    }
}
