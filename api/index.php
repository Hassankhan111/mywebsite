<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Register Composer Autoloader
$autoload = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoload)) {
    require $autoload;
} else {
    die("FATAL: vendor/autoload.php not found.");
}

// Bootstrap Laravel
$appFile = __DIR__ . '/../bootstrap/app.php';
if (file_exists($appFile)) {
    $app = require_once $appFile;
} else {
    die("FATAL: bootstrap/app.php not found.");
}

// Handle Request
$app->handleRequest(Request::capture());