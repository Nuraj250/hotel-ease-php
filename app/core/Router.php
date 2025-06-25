<?php

class Router {
    public function route() {
        $url = isset($_GET['url']) ? explode('/', $_GET['url']) : [];

        $controllerName = !empty($url[0]) ? ucfirst($url[0]) . 'Controller' : 'AuthController';
        $methodName = $url[1] ?? 'index';

        unset($url[0], $url[1]);
        $params = array_values($url);

        if (file_exists("../app/controllers/$controllerName.php")) {
            $controller = new $controllerName;
            if (method_exists($controller, $methodName)) {
                call_user_func_array([$controller, $methodName], $params);
            } else {
                echo "Method '$methodName' not found in $controllerName";
            }
        } else {
            echo "Controller '$controllerName' not found.";
        }
    }
}
