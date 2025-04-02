<?php

// App/Helpers/Debugger.php
namespace App\Helpers;

class Debugger {
    public static function debugPrint($data) {
            echo '<pre>';
            print_r($data);
            echo '</pre>';
    }
}


?>