<?php

spl_autoload_register(function ($class) {
    $baseDir = __DIR__ . '/src/';

    $file = $baseDir . str_replace('\\', '/', $class) . '.php';

    if (file_exists($file)) {
        require_once $file;
    } else {
        throw new Exception("Class file for '$class' not found in $file");
    }
});