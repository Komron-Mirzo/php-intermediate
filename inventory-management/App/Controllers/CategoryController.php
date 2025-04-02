<?php

# Handle actions related to categories

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Helpers\Debugger;
use App\Models\Category;
use App\Helpers\Sanitizer;
use App\Helpers\Pagination;

class CategoryController extends BaseController
{
    public function index()
    {
        //Add new Category
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = Sanitizer::sanitizeString($_POST['category_name']) ?? '';
            $description = Sanitizer::sanitizeString($_POST['category_description']) ?? '';

            if (!empty($name) && !empty($description)) {
                Category::add($name, $description);
            }
        }


        $pagination_data = $this->getAllCategories(5);
        $categories = $pagination_data['categories'];
        $pagination = $pagination_data['pagination'];
        $total_page = $pagination['total_page'];
        $current_page = $pagination['current_page'];
        $prev_page = $pagination['prev_page'];
        $next_page = $pagination['next_page'];


        //Get the delete_id from GET query
        $delete_id = $_GET['delete_id'] ?? '';

        //Delete clicked category
        if (!empty($delete_id)) {
            Category::delete($delete_id);
           
            // Redirect back to the same page without query parameters
            header("Location: " . strtok($_SERVER['REQUEST_URI'], '?'));
            exit; // Ensure no further code runs after redirection
        }


        ob_start(); 
        include __DIR__ . '/../Views/Category/Index.php'; 
        $content = ob_get_clean(); 

        include __DIR__ . '/../Views/Layout/Layout.php'; 
    }

    public function edit()
    {

        //Edit the Category name and Description
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = Sanitizer::sanitizeString($_POST['category_name']) ?? '';
            $description = Sanitizer::sanitizeString($_POST['category_description']) ?? '';
            $category_id = $_GET['edit_id'] ?? '';

            if (!empty($name) && !empty($description) && !empty($category_id)) {
                Category::edit($name, $description, $category_id);
            }
        }
        //Get the edit and delete GET queries
        $id = $_GET['edit_id'] ?? '';
        

        //Get current category and show within form
        if (!empty($id)) {
            $currentCategory = Category::getCurrent($id);
        }


        ob_start(); 
        include __DIR__ . '/../Views/Category/Edit.php'; 
        $content = ob_get_clean(); 

        include __DIR__ . '/../Views/Layout/Layout.php'; 
    }

}


?>