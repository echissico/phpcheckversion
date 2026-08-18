<?php

require __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';

var_dump(
    $app->getProviders(
        \Illuminate\View\ViewServiceProvider::class
    )
);

var_dump($app->bound('view'));

exit;
