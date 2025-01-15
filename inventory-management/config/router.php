<?php

# Define URL routes for controllers and actions
namespace Config;

use SessionHandler;

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

            
            // Handle public routes
            if ($this->requiresPublicAccess($url)) {
                // Allow access without authentication
            } elseif ($this->requiresAuthAdmin($url)) {
                // Admin-only routes
                if (!$this->isAuthenticated() || !$this->isAdmin()) {

                    $this->destroySession();

                    header('Location: login');
                    exit;
                }
            } elseif ($this->requiresAuthGeneral($url)) {
                // General authenticated routes
                if (!$this->isAuthenticated()) {

                    $this->destroySession();

                    header('Location: login');
                    exit;
                }
            } else {
                // Default: Redirect unauthorized access to login
                $this->destroySession();

                header('Location: logout');
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
    private function requiresAuthAdmin(string $url): bool
    {
        // Define protected routes for admin
        $adminOnlyRoutes = [
            'users',
            'users/edit'
        ];
    
        return in_array($url, $adminOnlyRoutes);
    }

    private function requiresAuthGeneral (string $url) : bool {
       // General protected routes (both admins and users may access)
        $protectedRoutes = [
            'dashboard',
            'products',
            'products/edit',
            'categories/edit',
            'categories',
            'settings',
        ];

        return in_array($url, $protectedRoutes);

    }

    private function requiresPublicAccess(string $url): bool
{
    // Define routes that do not require authentication
    $publicRoutes = [
        'login',
        'register',
    ];

    return in_array($url, $publicRoutes);
}

    

    // Check if the user is authenticated
    private function isAuthenticated(): bool
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        return isset($_SESSION['user_id']);
    }

    private function isAdmin() : bool {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        return isset($_SESSION['user_id']) && isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin';
    }

    private function destroySession () {
              // Start the session if it hasn't been started
              if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }

            // Unset all session variables
            $_SESSION = [];

            // Destroy the session cookie if it exists
            if (ini_get("session.use_cookies")) {
                $params = session_get_cookie_params();
                setcookie(
                    session_name(),
                    '',
                    time() - 42000, // Expire the cookie in the past
                    $params["path"],
                    $params["domain"],
                    $params["secure"],
                    $params["httponly"]
                );
            }

            // Destroy the session
            session_destroy();

    }

    public function getRoutes(): array
    {
        return $this->routes;
    }
}


?>