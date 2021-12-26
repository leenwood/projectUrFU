<?php

class Router
{
    protected $routes = [];

    public function __construct($routes = [])
    {
        foreach ($routes as $path => $route ) {
            if (!is_string($path) || !is_array($route)) {
                throw new \InvalidArgumentException(
                    sprintf("Invalid route for %s path, route must be an array", $path)
                );
            }

            if (!isset($route['controller']) || !isset($route['action'])) {
                throw new \InvalidArgumentException(
                    sprintf("Invalid route for %s path, action name of controller name is absent", $path)
                );
            }

            $this->register($path, $route['controller'], $route['action']);
        }

    }

    public function register($path, $controller, $action)
    {
        $this->routes[$path] = [
            'controller' => $controller,
            'action' => $action
        ];
    }

    public function match($path)
    {
        if (!isset($this->routes[$path])) {
            throw new \InvalidArgumentException(sprintf(
                "Route not found for path %s", $path));
        }

        return $this->routes[$path];
    }



}