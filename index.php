<?php

declare(strict_types=1);

error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__ . '/vendor/autoload.php';

use app\Router;
use app\Exception\RouteNotFoundException;

define('VIEW_PATH', __DIR__ . '/src/app/View');

try {
    $router = new Router();

    $router->get('/', [\app\Controller\UserController::class, 'index'])
        ->get('/users', [\app\Controller\UserController::class, 'index'])
        ->get('/users/create', [\app\Controller\UserController::class, 'create'])
        ->post('/users/create', [\app\Controller\UserController::class, 'store'])
        ->get('/users/edit', [\app\Controller\UserController::class, 'edit'])
        ->post('/users/update', [\app\Controller\UserController::class, 'update'])
        ->post('/users/delete', [\app\Controller\UserController::class, 'delete']);

    $result = $router->resolve($_SERVER['REQUEST_URI'], strtolower($_SERVER['REQUEST_METHOD']));

    echo $result;
} catch (RouteNotFoundException $e) {
    header("HTTP/1.0 404 Not Found");
    echo "404 - Page Not Found";
}
