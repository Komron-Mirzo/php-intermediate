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

        // Default route if no specific route is requested
        if ($url === '') {
            $url = 'dashboard';
        }

        // Check if the route exists
        if (array_key_exists($url, $this->routes)) {
            $route = $this->routes[$url];
            $controllerClass = "App\\Controllers\\" . $route['controller'];
            $method = $route['method'];

            // Middleware-like checks (authentication)
            if ($this->requiresAuth($url) && !$this->isAuthenticated()) {
                // Redirect to login if the user is not authenticated
                header('Location: login');
                exit;
            }

            if (class_exists($controllerClass)) {
                $controller = new $controllerClass();

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

    // Define routes that require authentication
    private function requiresAuth(string $url): bool
    {
        $protectedRoutes = [
            'dashboard',
            'products',
            'categories',
            'users',
            'settings',
        ];

        return in_array($url, $protectedRoutes);
    }

    // Check if the user is authenticated
    private function isAuthenticated(): bool
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        return isset($_SESSION['user_id']);
    }

    public function getRoutes(): array
    {
        return $this->routes;
    }
}


?>