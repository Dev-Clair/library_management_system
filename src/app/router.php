<?php

declare(strict_types=1);

namespace db;

$routes = [
    '/' => 'UserController@index',
    '/user/create' => 'UserController@create',
    '/user/store' => 'UserController@store',
];

return $routes;
