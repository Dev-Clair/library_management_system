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
        return $this->register('get', $route, $action);
    }

    public function post(string $route, callable|array $action): self
    {
        return $this->register('post', $route, $action);
    }

    public function routes(): array
    {
        return $this->routes;
    }

    public function resolve(string $requestUri, string $requestMethod)
    {
        echo "Trying to resolve route: $requestUri, Request Method: $requestMethod" . "<br>";
        $route = explode('?', $requestUri)[0];
        echo "$route" . "<br>";
        $action = $this->routes[$requestMethod][$route] ?? null;
        echo "$action" . "<br>";

        if (!$action) {
            throw new RouteNotFoundException();
        }

        if (is_callable($action)) {
            return call_user_func($action);
        }

        if (is_array($action)) {
            [$class, $method] =  $action;

            if (class_exists($class)) {
                $class = new $class;
            }

            if (method_exists($class, $method)) {
                call_user_func_array([$class, $method], []);
            }
        }
        throw new RouteNotFoundException();
    }
}
