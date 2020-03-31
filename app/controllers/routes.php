<?php

namespace app;

class Routes
{
    function route($action)
    {
        $controller = new Controller;
        if (!$action) return $controller->home();
        if ((int) method_exists($controller, $action) == 1) {
            $saida = $controller->$action();
        } else {
            $saida = $controller->erro();
        }
        return $saida;
    }
}
