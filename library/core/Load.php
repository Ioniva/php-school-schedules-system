<?php

define("CONTROLLERS", "app/controllers/");

// Load
$controller = ucwords($controller);
$controllerFile = CONTROLLERS . $controller . ".php";

if (file_exists($controllerFile)) {
    require_once($controllerFile);
    $controller = new $controller();

    if (method_exists($controller, $method)) {
        $controller->{$method}($params);
    } else {
        require_once(CONTROLLERS . "Errors.php");
    }
} else {
    require_once(CONTROLLERS . "Errors.php");
}
