<?php

declare(strict_types=1);

error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__ . '/vendor/autoload.php';

use app\Router;
use app\Exception\RouteNotFoundException;

define('VIEW_PATH', __DIR__ . '/app/View');

try {
    $router = new Router();

    $router->get('/', [\app\Controller\MainController::class, 'index'])
        ->get('/user', [\app\Controller\UserController::class, 'index'])
        ->get('/user/create', [\app\Controller\UserController::class, 'create'])
        ->post('/user/create', [\app\Controller\UserController::class, 'store'])
        ->get('/user/edit', [\app\Controller\UserController::class, 'edit'])
        ->post('/user/edit', [\app\Controller\UserController::class, 'update'])
        ->post('/user/delete', [\app\Controller\UserController::class, 'delete']);

    // Extract the path from the request URI
    $requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    $result = $router->resolve($requestUri, $_SERVER['REQUEST_METHOD']);

    echo $result;
} catch (RouteNotFoundException $e) {
    header("HTTP/1.0 404 Not Found");
    echo "404 - Page Not Found";
}


// declare(strict_types=1);

// error_reporting(E_ALL);
// ini_set('display_errors', 1);

// require __DIR__ . '/vendor/autoload.php';

// use app\Router;
// use app\Exception\RouteNotFoundException;

// define('VIEW_PATH', __DIR__ . '/app/View');

// try {
//     $router = new Router();

//     $router->get('/', [\app\Controller\MainController::class, 'index'])
//         ->get('/user', [\app\Controller\UserController::class, 'index'])
//         ->get('/user/create', [\app\Controller\UserController::class, 'create'])
//         ->post('/user/create', [\app\Controller\UserController::class, 'store'])
//         ->get('/user/edit', [\app\Controller\UserController::class, 'edit'])
//         ->post('/user/edit', [\app\Controller\UserController::class, 'update'])
//         ->post('/user/delete', [\app\Controller\UserController::class, 'delete']);

//     $result = $router->resolve($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);

//     echo $result;
// } catch (RouteNotFoundException $e) {
//     header("HTTP/1.0 404 Not Found");
//     echo "404 - Page Not Found";
// }
