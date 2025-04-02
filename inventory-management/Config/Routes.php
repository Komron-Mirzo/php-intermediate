<?php

$routes = [
    'index.php' => [
        'controller' => 'DashboardController',
        'method' => 'Index',
    ],
    'dashboard' => [
        'controller' => 'DashboardController',
        'method' => 'Index',
    ],
    'products' => [
        'controller' => 'ProductController',
        'method' => 'Index'
    ],
    'products/add' => [
        'controller' => 'ProductController',
        'method' => 'Add'
    ],
    'products/edit' => [
        'controller' => 'ProductController',
        'method' => 'Edit'
    ],
    'categories' => [
        'controller' => 'CategoryController',
        'method' => 'Index'
    ],
    'categories/edit' => [
        'controller' => 'CategoryController',
        'method' => 'Edit'
    ],
    'users' => [
        'controller' => 'UserController',
        'method' => 'Index'
    ],
    'users/edit' => [
        'controller' => 'UserController',
        'method' => 'Settings'
    ],
    'settings' => [ 
        'controller' => 'UserController',
        'method' => 'Settings' 
    ],
    'login' => [ 
        'controller' => 'UserController',
        'method' => 'Login' 
    ],
    'logout' => [ 
        'controller' => 'UserController',
        'method' => 'Logout' 
    ],
    'register' => [ 
        'controller' => 'UserController',
        'method' => 'Register' 
    ],
    
];

return $routes;




?>

