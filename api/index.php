<?php

header('Content-Type: text/plain');

echo "1. START\n";
flush();

require __DIR__.'/../vendor/autoload.php';

echo "2. AUTOLOAD OK\n";
flush();

$app = require_once __DIR__.'/../bootstrap/app.php';

echo "3. BOOTSTRAP OK\n";
flush();

$app->register(\Illuminate\View\ViewServiceProvider::class);

echo "4. VIEW PROVIDER OK\n";
flush();

var_dump($app->bound('view'));

echo "5. VIEW BOUND OK\n";
flush();

$request = \Illuminate\Http\Request::capture();

echo "6. REQUEST OK\n";
flush();

$response = $app->handleRequest($request);

echo "7. RESPONSE OK\n";
flush();
