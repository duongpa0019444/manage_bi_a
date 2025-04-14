<?php
spl_autoload_register(function ($class) {
    $prefix = 'App\\';
    $baseDir = __DIR__ . '/';
    
    if (strpos($class, $prefix) === 0) {
        $relativeClass = substr($class, strlen($prefix));
        $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';

        if (file_exists($file)) {
            require $file;
        } else {
            die("Autoload error: File not found for class $relativeClass at $file");
        }
    }
});
