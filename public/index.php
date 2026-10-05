<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader
$autoloadPath = __DIR__.'/../vendor/autoload.php';
if (!file_exists($autoloadPath)) {
    // Fallback if vendor is in root directory relative to current working directory
    $autoloadPath = base_path('vendor/autoload.php'); 
}
require $autoloadPath;

// Bootstrap Laravel and handle the request...
$appPath = __DIR__.'/../bootstrap/app.php';
(require_once $appPath)
    ->handleRequest(Request::capture());