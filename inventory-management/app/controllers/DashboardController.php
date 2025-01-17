<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;

class DashboardController extends BaseController {

    public function index() {

        $total_users = User::getAllUsersCount();
        $total_categories = Category::getTotalCategoryCount();
        $total_products = Product::getTotalProductCount();

        ob_start(); 
        include __DIR__ . '/../views/dashboard.php'; 
        $content = ob_get_clean(); 

        include __DIR__ . '/../views/layout/layout.php'; 
    }
}


?>