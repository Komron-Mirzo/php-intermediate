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



       // Delete user 
        if (isset($_GET['delete_id']) && !empty($_GET['delete_id'])) {
            
            User::deleteUser($_GET['delete_id']);

            unset($get['delete_id']);

            header('Location: users');
            exit();
        }
        


        ob_start(); 
        include __DIR__ . '/../Views/User/Index.php'; 
        $content = ob_get_clean(); 

        include __DIR__ . '/../Views/Layout/Layout.php'; 
    }

    public function settings()
    {
        // Get Current User
        $get = [
            'admin' => $_SESSION['user_id'] ?? 1,
            'edit_id' => $_GET['edit_id'] ?? '',
            'delete_id' => $_GET['delete_id'] ?? ''
        ];

        if (!empty($get['edit_id'])) {
            $user_id = $_GET['edit_id'];
        } else {
            $user_id = $_SESSION['user_id'];
        }

        // Get current user to fill edit form        
        $current_user = User::getCurrentUser($user_id);

        // Get All User roles for dropdown user field
        $user_roles = User::getAllUserRoles();


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $user_id = !empty($get['edit_id']) ? $get['edit_id'] : $current_user['user_id'];

            if ($_POST['form_type'] === 'edit_user_info') {
                
                $username = Sanitizer::sanitizeString($_POST['user_name']) ?? '';
                $email = Sanitizer::sanitizeEmail($_POST['user_email']) ?? '';
                $role = Sanitizer::sanitizeString($_POST['user_roles']) ?? '';

                if (!empty($user_id) && !empty($username) && !empty($email) && !empty($role) && $current_user['role'] === 'admin') {

                    User::editUserInfo($user_id, $username, $email, $role);
                    $redirect = str_replace('/edit', '', $_SERVER['REDIRECT_URL']);
                    header('Location: ' . $redirect);
                    
                } else if (!empty($user_id) && !empty($username) && !empty($email) && $current_user['role'] === 'user') {

                    User::editUserInfo($user_id, $username, $email, $current_user['role']);
                    $redirect = str_replace('/edit', '', $_SERVER['REDIRECT_URL']);
                    header('Location: ' . $redirect);

                }
                

            } else if ($_POST['form_type'] === 'edit_user_password') {
                $old_password = Sanitizer::sanitizePassword($_POST['old_password']) ?? '';
                $new_password = Sanitizer::sanitizePassword($_POST['new_password']) ?? '';
                $new_password_confirm = Sanitizer::sanitizePassword($_POST['confirm_new_password']) ?? '';


                if (password_verify($old_password, $current_user['password'])) {

                    if ($new_password === $new_password_confirm) {

                        $new_password = password_hash($new_password, PASSWORD_DEFAULT);

                        User::setNewPassword($user_id, $new_password);

                        echo 'New password successfully set';
                    

                        // $redirect = str_replace('/edit', '', $_SERVER['REDIRECT_URL']);

                        // header('Location: ' . $redirect);
                    }

                }
            }
        }



        ob_start(); 
        include __DIR__ . '/../Views/User/Settings.php'; 
        $content = ob_get_clean(); 

        include __DIR__ . '/../Views/Layout/Layout.php'; 
    }

    public function login()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = Sanitizer::sanitizeEmail($_POST['login_email']) ?? '';
            $password = $_POST['login_password'] ?? '';
        
            // Check if both email and password are provided
            if (!empty($email) && !empty($password)) {
                $user = User::login($email);
        
                // Check if the user exists (i.e., the login returned an array)
                if (is_array($user)) {
                    // Now verify the password only if the user exists
                    if (password_verify($password, $user['password'])) {
                        // Password is correct, log the user in
                        $_SESSION['user_id'] = $user['user_id'];
                        $_SESSION['username'] = $user['username'];
                        $_SESSION['user_role'] = $user['role'];
                        header('Location: dashboard');
                        exit();  // Always use exit() after header redirects
                    } else {
                        // Password is incorrect
                        $error_message = "Incorrect password.";
                    }
                } else {
                    // Email not found in the system
                    $error_message = "User not found.";
                }
            } else {
                // Handle the case where either email or password is empty
                $error_message = "Please enter both email and password.";
            }
        }
        
        

        include __DIR__ . '/../Views/User/Login.php'; 
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

        
        include __DIR__ . '/../Views/User/Register.php'; 
    }


}

?>