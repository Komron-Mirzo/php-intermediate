<?php

# Handle actions related to users (authentication, etc.)


namespace App\Controllers;
use App\Controllers\BaseController;
use App\Helpers\Debugger;
use App\Models\User;
use App\Helpers\Sanitizer;

class UserController extends BaseController
{
    public function index()
    {
        // Display all users with pagination
        $pagination_data = $this->getAllUsers(5);
        $users = $pagination_data['users'];
        $pagination = $pagination_data['pagination'];

        
        $item_offset = $pagination['item_offset'];
        $total_page = $pagination['total_page'];
        $current_page = $pagination['current_page'];
        $prev_page = $pagination['prev_page'];
        $next_page = $pagination['next_page'];

        // Get current user


        ob_start(); 
        include __DIR__ . '/../views/user/index.php'; 
        $content = ob_get_clean(); 

        include __DIR__ . '/../views/layout/layout.php'; 
    }


    public function settings()
    {
        // Get Current User
        $get = [
            'admin' => $_SESSION['user_id'] ?? 1,
            'edit_id' => $_GET['edit_id'] ?? ''
        ];

        if (!empty($get['edit_id'])) {
            $user_id = $_GET['edit_id'];
        } else {
            $user_id = $_SESSION['user_id'];
        }
        
        $current_user = User::getCurrentUser($user_id);

        // Get All User roles
        $user_roles = User::getAllUserRoles();


        ob_start(); 
        include __DIR__ . '/../views/user/settings.php'; 
        $content = ob_get_clean(); 

        include __DIR__ . '/../views/layout/layout.php'; 
    }

    public function login()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = Sanitizer::sanitizeEmail($_POST['login_email']) ?? '';
            $password = $_POST['login_password'] ?? '';
            $user = User::login($email);

            if (!empty($email) && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['user_role'] = $user['role'];
                Header('Location: dashboard');
            }

           
        }
        

        include __DIR__ . '/../views/user/login.php'; 
    }

    public function logout()
    {
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

        // Redirect the user to the login page or home page
        header("Location: login");
        exit;
    }


    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $username = Sanitizer::sanitizeString($_POST['register_name']) ?? '';
            $password = Sanitizer::sanitizePassword(password_hash($_POST['register_password'], PASSWORD_DEFAULT)) ?? '';
            $email = Sanitizer::sanitizeEmail($_POST['register_email']) ?? '';

            if (!empty($username) && !empty($password) && !empty($email)) {
                User::register($username, $password, $email);
                Header('Location: login');
            }
        }

        
        include __DIR__ . '/../views/user/register.php'; 
    }

}

?>