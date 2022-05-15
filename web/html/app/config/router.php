<?php

use Phalcon\Mvc\Router;

$router = $di->getRouter();

// Define your routes here

$router->add(
    '/auth/login',
    [
        'controller' => 'auth',
        'action' => 'login'
    ]
);

$router->add(
    '/auth/logout',
    [
        'controller' => 'auth',
        'action' => 'logout'
    ]
);

$router->add(
    'account',
    [
        'controller' => 'account',
        'action' => 'index'
    ]
);

$router->add(
    '/api/users/{search}',
    [
        'controller' => 'api',
        'action' => 'users',
    ]
);

$router->add(
    'api/customers/{search}',
    [
        'controller' => 'api',
        'action' => 'customers'
    ]
);

$router->add(
    'users/update/{user_id}',
    [
        'controller' => 'users',
        'action' => 'update',
    ]
);

$router->add(
    'users/password/{user_id}',
    [
        'controller' => 'users',
        'action' => 'password'
    ]
);

$router->handle();
