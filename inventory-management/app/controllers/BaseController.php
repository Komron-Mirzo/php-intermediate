<?php

namespace App\Controllers;

use Config\Router;

class BaseController
{
    protected $routes;

    public function __construct()
    {
        // Load the routes configuration and make it available to all controllers
        $router = new Router(require __DIR__ . '/../../config/routes.php');
        $this->routes = $router->getRoutes();
    }
}


?>