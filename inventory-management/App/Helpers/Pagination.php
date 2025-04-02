<?php

namespace App\Helpers;
use InvalidArgumentException;

class Pagination {

    private $item_per_page;
    private $current_page;

    function __construct($item_per_page = 10){
        $this->item_per_page = $item_per_page;
    }

    public function getItemPerPage () {
        return $this->item_per_page;
    }

    public function setItemPerPage ($item_per_page) {
        if ($item_per_page <= 0) {
            throw new InvalidArgumentException("Item per page should be bigger than 0");
        }
        $this->item_per_page = $item_per_page;
    }

    public function getCurrentPage () {
        return $this->current_page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1; 
    }

    public function setCurrentPage ($current_page) {
        if ($current_page <= 0) {
            throw new InvalidArgumentException("Current page should be bigger than zero");
        }
        $this->current_page = $current_page;
    }

    public function getItemOffset () {
        return ($this->current_page - 1) * $this->item_per_page;
    }

    public function getPageTotal ($item_total) {
        return ceil($item_total / $this->item_per_page);
    }

    public static function getPaginationData($total_items, $items_per_page = 10) {
        $pagination = new Pagination($items_per_page);
        $current_page = $pagination->getCurrentPage();
        $total_page = $pagination->getPageTotal($total_items);
        $prev_page = $current_page > 1 ? $current_page - 1 : null;
        $next_page = $current_page < $total_page ? $current_page + 1 : null;
        $item_offset = $pagination->getItemOffset();

        return [
            'current_page' => $current_page,
            'total_page' => $total_page,
            'prev_page' => $prev_page,
            'next_page' => $next_page,
            'item_offset' => $item_offset,
            'item_limit' => $pagination->getItemPerPage(),
        ];
    }

}

?>






