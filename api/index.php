<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

$tmp = '/tmp/laravel';

$directories = [
    $tmp,
    $tmp.'/storage',
    $tmp.'/storage/app',
    $tmp.'/storage/app/public',
    $tmp.'/storage/framework',
    $tmp.'/storage/framework/cache',
    $tmp.'/storage/framework/cache/data',
    $tmp.'/storage/framework/sessions',
    $tmp.'/storage/framework/views',
    $tmp.'/storage/bootstrap/cache',
    $tmp.'/storage/logs',
];

foreach ($directories as $directory) {
    if (!is_dir($directory)) {
        mkdir($directory, 0755, true);
    }
}

$_ENV['APP_SERVICES_CACHE'] = $tmp.'/storage/bootstrap/cache/services.php';
$_ENV['APP_PACKAGES_CACHE'] = $tmp.'/storage/bootstrap/cache/packages.php';
$_ENV['APP_CONFIG_CACHE'] = $tmp.'/storage/bootstrap/cache/config.php';
$_ENV['APP_ROUTES_CACHE'] = $tmp.'/storage/bootstrap/cache/routes.php';
$_ENV['APP_EVENTS_CACHE'] = $tmp.'/storage/bootstrap/cache/events.php';

require __DIR__.'/../vendor/autoload.php';

$app = require_once __DIR__.'/../bootstrap/app.php';

$app->useStoragePath($tmp.'/storage');

$app->register(\Illuminate\View\ViewServiceProvider::class);

$app->handleRequest(Request::capture());


