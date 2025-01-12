<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class DashboardController extends BaseController {
    public function index() {
        ob_start(); 
        include __DIR__ . '/../views/dashboard.php'; 
        $content = ob_get_clean(); 

        include __DIR__ . '/../views/layout/layout.php'; 
    }
}


?>