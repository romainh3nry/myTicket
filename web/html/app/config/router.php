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

$router->handle();
