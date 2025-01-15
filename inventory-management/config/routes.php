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
    'products/add' => [
        'controller' => 'ProductController',
        'method' => 'add'
    ],
    'products/edit' => [
        'controller' => 'ProductController',
        'method' => 'edit'
    ],
    'categories' => [
        'controller' => 'CategoryController',
        'method' => 'index'
    ],
    'categories/edit' => [
        'controller' => 'CategoryController',
        'method' => 'edit'
    ],
    'users' => [
        'controller' => 'UserController',
        'method' => 'index'
    ],
    'users/edit' => [
        'controller' => 'UserController',
        'method' => 'settings'
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

