<?php

$file = __DIR__.'/../vendor/.composer/autoload.php';
if (!file_exists($file)) {
    throw new RuntimeException('Install dependencies to run test suite.');
}

spl_autoload_register(function($class) {
    if (0 === strpos($class, 'PassVault_')) {
        $path = __DIR__.'/../lib/'.implode('/', explode('_', $class)).'.php';
        if (!stream_resolve_include_path($path)) {
            return false;
        }
        require_once $path;
        return true;
    }
});