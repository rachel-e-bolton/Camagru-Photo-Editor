<?php


class Route {

    private $uri;
    private $function;
    private $args;

    function __construct($uri, $function, $args)
    {
        $this->uri = $uri;
        $this->function = $function;
        $this->args = $args;
    }

    function invoke()
    {
        $this->function->__invoke();
    }
}


class Router {

    private $routes = [];

    function get($uri, $function, ...$args)
    {
        $routes[] = new Route($uri, $function, $args);
    }


}



?>