<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use app\Router;
use app\Exceptions\RouteNotFoundException;

try {
    $router = new Router();

    $router->get('/UserController', [app\Controller\UserController::class, 'index'])
        ->get('/UserController/index', [app\Controller\UserController::class, 'index'])
        ->get('/UserController/create', [app\Controller\UserController::class, 'create'])
        ->post('/UserController/create', [app\Controller\UserController::class, 'store'])
        ->get('/UserController/edit', [app\Controller\UserController::class, 'edit'])
        ->post('/UserController/update', [app\Controller\UserController::class, 'update'])
        ->post('/UserController/delete', [app\Controller\UserController::class, 'delete']);

    $result = $router->resolve($_SERVER['REQUEST_URI'], strtolower($_SERVER['REQUEST_METHOD']));
    echo $result;
} catch (RouteNotFoundException $e) {
    header("HTTP/1.0 404 Not Found");
    echo "404 - Page Not Found";
}
