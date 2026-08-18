<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

echo "API INDEX OK<br>";

require __DIR__ . '/../vendor/autoload.php';

echo "AUTOLOAD OK<br>";

$app = require_once __DIR__ . '/../bootstrap/app.php';

echo "BOOTSTRAP OK<br>";

$request = Illuminate\Http\Request::capture();

echo "REQUEST OK<br>";

try {
    $app->handleRequest($request);

    echo "HANDLE REQUEST OK<br>";
} catch (\Throwable $e) {
    echo "<h1>ERRO LARAVEL</h1>";
    echo "<pre>";
    echo "Classe: " . get_class($e) . PHP_EOL;
    echo "Mensagem: " . $e->getMessage() . PHP_EOL;
    echo "Arquivo: " . $e->getFile() . PHP_EOL;
    echo "Linha: " . $e->getLine() . PHP_EOL;
    echo PHP_EOL;
    echo $e->getTraceAsString();
    echo "</pre>";
}
