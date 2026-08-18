<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

try {
    echo "1. START<br>";

    require __DIR__ . '/../vendor/autoload.php';

    echo "2. AUTOLOAD OK<br>";

    $app = require_once __DIR__ . '/../bootstrap/app.php';

    echo "3. BOOTSTRAP OK<br>";

    $request = Illuminate\Http\Request::capture();

    echo "4. REQUEST OK<br>";

    $app->handleRequest($request);

    echo "5. HANDLE OK<br>";

} catch (\Throwable $e) {

    http_response_code(500);

    echo "<h1>ERRO</h1>";

    echo "<pre>";
    echo "Classe: " . get_class($e) . PHP_EOL;
    echo "Mensagem: " . $e->getMessage() . PHP_EOL;
    echo "Arquivo: " . $e->getFile() . PHP_EOL;
    echo "Linha: " . $e->getLine() . PHP_EOL;
    echo PHP_EOL;
    echo $e->getTraceAsString();
    echo "</pre>";
}
