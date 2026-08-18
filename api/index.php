<?php

require __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';

$app->register(\Illuminate\View\ViewServiceProvider::class);

var_dump($app->bound('view'));

exit;
