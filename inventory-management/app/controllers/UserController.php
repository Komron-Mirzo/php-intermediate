<?php

# Handle actions related to users (authentication, etc.)


namespace App\Controllers;
use App\Controllers\BaseController;

class UserController extends BaseController
{
    public function index()
    {
        ob_start(); 
        include __DIR__ . '/../views/user/index.php'; 
        $content = ob_get_clean(); 

        include __DIR__ . '/../views/layout/layout.php'; 
    }


    public function settings()
    {
        ob_start(); 
        include __DIR__ . '/../views/user/settings.php'; 
        $content = ob_get_clean(); 

        include __DIR__ . '/../views/layout/layout.php'; 
    }

    public function login()
    {
        include __DIR__ . '/../views/user/login.php'; 
    }

    public function register()
    {
        include __DIR__ . '/../views/user/register.php'; 
    }

}

?>