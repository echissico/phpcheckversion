<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

try {
    echo "1. START<br>";

    // Diretórios graváveis do Vercel
    $tmp = '/tmp/laravel';

    $directories = [
        $tmp,
        $tmp . '/storage',
        $tmp . '/storage/app',
        $tmp . '/storage/framework',
        $tmp . '/storage/framework/cache',
        $tmp . '/storage/framework/sessions',
        $tmp . '/storage/framework/views',
        $tmp . '/storage/logs',
        $tmp . '/bootstrap/cache',
    ];

    foreach ($directories as $directory) {
        if (!is_dir($directory)) {
            mkdir($directory, 0755, true);
        }
    }

    echo "2. TMP OK<br>";

    require __DIR__ . '/../vendor/autoload.php';

    echo "3. AUTOLOAD OK<br>";

    $app = require_once __DIR__ . '/../bootstrap/app.php';

    echo "4. BOOTSTRAP OK<br>";

    // Storage gravável
    $app->useStoragePath($tmp . '/storage');

    echo "5. STORAGE OK<br>";

    $request = Illuminate\Http\Request::capture();

    echo "6. REQUEST OK<br>";

    $app->handleRequest($request);

} catch (\Throwable $e) {

    http_response_code(500);

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
