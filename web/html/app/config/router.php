<?php

use Phalcon\Mvc\Router;

$router = $di->getRouter();

// Define your routes here

$router->notFound(
    [
        "controller" => 'error',
        "action" => "code404"
    ]
);

$router->add(
    '/auth/login',
    [
        'controller' => 'auth',
        'action' => 'login'
    ]
);

$router->handle();
