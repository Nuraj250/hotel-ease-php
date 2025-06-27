<?php

require_once '../app/core/Router.php';
require_once '../app/core/Controller.php';

$config = require_once '../config/config.php';

// Autoload models and controllers
spl_autoload_register(function ($class) {
    if (file_exists("../app/controllers/$class.php")) {
        require_once "../app/controllers/$class.php";
    } elseif (file_exists("../app/models/$class.php")) {
        require_once "../app/models/$class.php";
    }
});

$router = new Router();
$router->route();
