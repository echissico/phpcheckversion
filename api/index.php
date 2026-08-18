<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

$storagePath = '/tmp/storage';

foreach ([
    'app',
    'framework/cache',
    'framework/sessions',
    'framework/views',
    'logs',
] as $directory) {
    $path = $storagePath . '/' . $directory;

    if (!is_dir($path)) {
        mkdir($path, 0755, true);
    }
}

require __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';

$app->useStoragePath($storagePath);

$app->handleRequest(Request::capture());
