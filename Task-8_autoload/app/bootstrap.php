<?php
spl_autoload_register(function ($class) {
    $dirs = [
        'core/',
        'app/models/',
        'app/core/',
    ];

    $class_file = $class . '.php';
    foreach ($dirs as $dir) {
        $path = $dir . $class_file;

        if (file_exists($path)) {
            require_once $path;
        }
    }
});

$route = new Route();
$route->start();
?>