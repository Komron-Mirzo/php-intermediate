<?php

namespace App\Controllers;

use Config\Router;
use App\Helpers\Pagination;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;

class BaseController
{
    protected $routes;

    public function __construct()
    {
        // Load the routes configuration and make it available to all controllers
        $router = new Router(require __DIR__ . '/../../config/routes.php');
        $this->routes = $router->getRoutes();
    }

    public function getAllProducts ($items_per_page = 9) {
        $total_products_count = Product::getTotalProductCount();
        
        // Pass the desired item_limit for this section (default is 9)
        $pagination_data = Pagination::getPaginationData($total_products_count, $items_per_page);
        
        // Get products based on pagination
        $products = Product::getAll($pagination_data['item_limit'], $pagination_data['item_offset']);
        
        // Return all necessary data
        return [
            'products' => $products,
            'pagination' => $pagination_data,
        ];
    }

    public function getAllCategories ($items_per_page = 5) {
        $total_categories_count = Category::getTotalCategoryCount();

        $pagination_data = Pagination::getPaginationData($total_categories_count, $items_per_page);

        $categories = Category::getAllOffset($pagination_data['item_limit'], $pagination_data['item_offset']);

        return [
            'categories' => $categories,
            'pagination' => $pagination_data,
        ];
    }

    public function getAllUsers ($items_per_page = 5) {
        $total_users_count = User::getAllUsersCount();

        $pagination_data = Pagination::getPaginationData($total_users_count, $items_per_page);

        $users =  User::getAllUsersOffset($pagination_data['item_limit'], $pagination_data['item_offset']);

        return [
            'users' => $users,
            'pagination' => $pagination_data,
        ];

    }

}


?>