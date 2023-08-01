<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use app\Router;
use app\Exception\RouteNotFoundException;

define('VIEW_PATH', __DIR__ . '/src/app/View');

try {
    $router = new Router();

    $router->get('/', [UserController::class, 'index'])
        ->get('/users', [UserController::class, 'index'])
        ->get('/users/create', [UserController::class, 'create'])
        ->post('/users/create', [UserController::class, 'store'])
        ->get('/users/edit', [UserController::class, 'edit'])
        ->post('/users/update', [UserController::class, 'update'])
        ->post('/users/delete', [UserController::class, 'delete']);

    $result = $router->resolve($_SERVER['REQUEST_URI'], strtolower($_SERVER['REQUEST_METHOD']));
    echo $result;
} catch (RouteNotFoundException $e) {
    header("HTTP/1.0 404 Not Found");
    echo "404 - Page Not Found";
}
