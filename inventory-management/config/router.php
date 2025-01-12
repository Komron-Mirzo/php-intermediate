<?php

# Define URL routes for controllers and actions
namespace Config;

class Router
{
    private $routes;

    public function __construct(array $routes)
    {
        $this->routes = $routes;
    }

    public function run(): void
    {
          // Get the full request URL, and remove the base public directory
        $url = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

        // Adjust the URL to remove the "public" directory from the request path
        $url = str_replace('php-intermediate/inventory-management/public/', '', $url);
        
    

        if (array_key_exists($url, $this->routes)) {
            $route = $this->routes[$url];
            $controllerClass = "App\\Controllers\\" . $route['controller'];


            if (class_exists($controllerClass)) {
                $controller = new $controllerClass();
                $method = $route['method'];

                if (method_exists($controller, $method)) {
                    $controller->$method();
                } else {
                    die("Method $method not found in $controllerClass");
                }
            } else {
                die("Controller $controllerClass not found");
            }
        } else {
            die("Route $url not found");
        }
    }

    public function getRoutes(): array
    {
        return $this->routes;
    }
}

?>