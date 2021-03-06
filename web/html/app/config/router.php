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
    '/account',
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
    '/api/customers/{search}',
    [
        'controller' => 'api',
        'action' => 'customers'
    ]
);

$router->add(
    '/api/getCustomers',
    [
        'controller' => 'api',
        'action' => 'allCustomers',
    ]
);

$router->add(
    '/api/services',
    [
        'controller' => 'api',
        'action' => 'services',
    ]
);

$router->add(
    '/api/tickets',
    [
        'controller' => 'api',
        'action' => 'tickets',
    ]
);

$router->add(
    '/api/createUpdate',
    [
        'controller' => 'api',
        'action' => 'createUpdate'
    ]
);

$router->add(
    'api/updates/{ticket_id}',
    [
        'controller' => 'api',
        'action' => 'updates'
    ]
);

$router->add(
    'api/ticketsByUser',
    [
        'controller' => 'api',
        'action' => 'ticketsByUser',
    ]
);

$router->add(
    'api/search/{search}',
    [
        'controller' => 'api',
        'action' => 'search'
    ]
);

$router->add(
    '/users/update/{user_id}',
    [
        'controller' => 'users',
        'action' => 'update',
    ]
);

$router->add(
    '/users/password/{user_id}',
    [
        'controller' => 'users',
        'action' => 'password'
    ]
);

$router->add(
    '/customers/update/{customer_id}',
    [
        'controller' => 'customers',
        'action' => 'update'
    ]
);

$router->add(
    '/customers/create',
    [
        'controller' => 'customers',
        'action' => 'create',
    ]
);

$router->add(
    '/services/update/{service_id}',
    [
        'controller' => 'services',
        'action' => 'update',
    ]
);

$router->add(
    '/tickets',
    [
        'controller' => 'tickets',
        'action' => 'index',
    ]
);

$router->add(
    '/tickets/create',
    [
        'controller' => 'tickets',
        'action' => 'create',
    ]
);

$router->add(
    '/tickets/closure/{ticket_id}',
    [
        'controller' => 'tickets',
        'action' => 'closure',
    ]
);

$router->add(
    '/tickets/detail/{ticket_id}',
    [
        'controller' => 'tickets',
        'action' => 'detail',
    ]
);

$router->add(
    '/tickets/explore',
    [
        'controller'=> 'tickets',
        'action'=> 'explore',
    ]
);


$router->handle();
