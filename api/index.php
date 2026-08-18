<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

$tmp = '/tmp/laravel';

$directories = [
    $tmp,
    $tmp.'/storage',
    $tmp.'/storage/app',
    $tmp.'/storage/framework',
    $tmp.'/storage/framework/cache',
    $tmp.'/storage/framework/sessions',
    $tmp.'/storage/framework/views',
    $tmp.'/storage/logs',
];

foreach ($directories as $directory) {
    if (!is_dir($directory)) {
        mkdir($directory, 0755, true);
    }
}

require __DIR__.'/../vendor/autoload.php';

$app = require_once __DIR__.'/../bootstrap/app.php';

$app->useStoragePath($tmp.'/storage');

$app->register(\Illuminate\View\ViewServiceProvider::class);

$app->handleRequest(Request::capture());
