<?php

namespace app;

class Routes
{
    public static function route($action)
    {
        if (!$action) {
            return Controller::home();
        } else {
            $controller = new Controller;
            if (method_exists($controller, $action)) {
                return call_user_func_array(array($controller, $action), []);
            } else {
                return Controller::erro();
            }
        }
    }
}
