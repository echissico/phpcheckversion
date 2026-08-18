<?php

header('Content-Type: text/plain');

echo "1. START\n";

require __DIR__ . '/../vendor/autoload.php';

echo "2. AUTOLOAD OK\n";

$app = require_once __DIR__ . '/../bootstrap/app.php';

echo "3. BOOTSTRAP OK\n";

$app->register(\Illuminate\View\ViewServiceProvider::class);

echo "4. VIEW PROVIDER OK\n";

var_dump($app->bound('view'));

echo "5. END\n";
