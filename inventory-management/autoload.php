<?php

require_once __DIR__ . '/Config/Config.php';


spl_autoload_register(function($class) {

    // Replace namespace separator with directory separator and add '.php' extension
    $path = str_replace('\\', '/', $class) . '.php';

    // Base directory for the app (relative to inventory-management)
    $baseDir = __DIR__ . '/';

    // Full file path
    $file = $baseDir . $path;


    if (file_exists($file)) {
        require_once $file;
    } else {
        die("Class $class not found in $file");
    }
});

?>

