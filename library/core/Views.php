<?php

define("VIEWS", "app/views/");

class Views
{
    function getView($controller, $view, $data = "")
    {
        $controller = get_class($controller);
        $view = VIEWS . $view . ".php";
        require_once($view);
    }
}
