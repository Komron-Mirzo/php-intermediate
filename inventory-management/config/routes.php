<?php

$routes = [
    'index.php' => [
        'controller' => 'DashboardController',
        'method' => 'index',
    ],
    'dashboard' => [
        'controller' => 'DashboardController',
        'method' => 'index',
    ],
    'products' => [
        'controller' => 'ProductController',
        'method' => 'index'
    ],
    'categories' => [
        'controller' => 'CategoryController',
        'method' => 'index'
    ],
    'users' => [
        'controller' => 'UserController',
        'method' => 'index'
    ],
    'settings' => [ 
        'controller' => 'UserController',
        'method' => 'settings' 
    ],
    'login' => [ 
        'controller' => 'UserController',
        'method' => 'login' 
    ],
    'logout' => [ 
        'controller' => 'UserController',
        'method' => 'logout' 
    ],
    'register' => [ 
        'controller' => 'UserController',
        'method' => 'register' 
    ],
    
];

return $routes;




?>

