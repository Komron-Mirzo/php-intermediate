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
        // Get the full request URL
        $url = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

        // Dynamically determine the base path
        $basePath = trim(dirname($_SERVER['SCRIPT_NAME']), '/');

        // Remove the base path from the URL
        if (!empty($basePath) && strpos($url, $basePath) === 0) {
            $url = substr($url, strlen($basePath));
        }

        $url = trim($url, '/');

        if ($url === '') {
            $url = 'dashboard';
        }
        


        
    

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