<?php

echo "API INDEX OK<br>";

require __DIR__ . '/../vendor/autoload.php';

echo "AUTOLOAD OK<br>";

$app = require_once __DIR__ . '/../bootstrap/app.php';

echo "BOOTSTRAP OK<br>";

$request = Illuminate\Http\Request::capture();

echo "REQUEST OK<br>";
