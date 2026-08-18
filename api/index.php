<?php

use Illuminate\Http\Request;

require __DIR__.'/../vendor/autoload.php';

$app = require_once __DIR__.'/../bootstrap/app.php';

$app->register(\Illuminate\View\ViewServiceProvider::class);

$app->handleRequest(Request::capture());
