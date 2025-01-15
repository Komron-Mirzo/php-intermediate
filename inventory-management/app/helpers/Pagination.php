<?php

namespace App\Helpers;
use InvalidArgumentException;

class Pagination {

    private $item_per_page;
    private $current_page;

    function __construct($item_per_page = 10, $current_page = 0){
        $this->item_per_page = $item_per_page;
        $this->current_page = $current_page;
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
        return $this->current_page;
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

}

?>






