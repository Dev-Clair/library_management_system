<?php

declare(strict_types=1);

namespace app;

use app\Exception\RouteNotFoundException;

class Router
{
    private array $routes;

    public function register(string $requestMethod, string $route, callable|array $action): self
    {
        $this->routes[$requestMethod][$route] = $action;
        return $this;
    }

    public function get(string $route, callable|array $action): self
    {
        return $this->register('GET', $route, $action);
    }

    public function post(string $route, callable|array $action): self
    {
        return $this->register('POST', $route, $action);
    }

    public function resolve(string $requestUri, string $requestMethod)
    {
        $action = $this->routes[$requestMethod][$requestUri] ?? null;
        echo "<pre>";
        var_dump($requestUri);
        echo "\n";
        var_dump($requestMethod);
        echo "\n";
        var_dump($action);
        echo "<pre>";

        if (!$action) {
            throw new RouteNotFoundException();
        }

        if (is_callable($action)) {
            return call_user_func($action);
        }

        if (is_array($action)) {
            [$class, $method] = $action;

            if (class_exists($class)) {
                $class = new $class();
            }

            if (method_exists($class, $method)) {
                call_user_func_array([$class, $method], []);
            }
        }

        throw new RouteNotFoundException();
    }
}
