<?php

$router = $di->getRouter();

// Define your routes here

$router->add(
    '/auth/login',
    [
        'controller' => 'auth',
        'action' => 'login'
    ]
);

$router->handle();
