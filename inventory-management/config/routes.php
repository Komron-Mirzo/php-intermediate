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
    'logout' => [ 
        'controller' => 'UserController',
        'method' => 'login' 
    ],
    
];

return $routes;




?>

