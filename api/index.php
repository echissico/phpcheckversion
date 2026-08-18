<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

try {
    $tmp = '/tmp/laravel';

    foreach ([
        $tmp,
        $tmp . '/storage',
        $tmp . '/storage/app',
        $tmp . '/storage/framework',
        $tmp . '/storage/framework/cache',
        $tmp . '/storage/framework/sessions',
        $tmp . '/storage/framework/views',
        $tmp . '/storage/logs',
        $tmp . '/bootstrap/cache',
    ] as $dir) {
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }
    }

    require __DIR__ . '/../vendor/autoload.php';

    $app = require_once __DIR__ . '/../bootstrap/app.php';

    $app->useStoragePath($tmp . '/storage');

    $request = Illuminate\Http\Request::capture();

    $response = $app->handleRequest($request);

    echo "RESPONSE CLASS: " . get_class($response) . "<br>";
    echo "STATUS: " . $response->getStatusCode() . "<br>";

    $response->send();

} catch (\Throwable $e) {

    http_response_code(500);

    echo '<pre>';
    echo 'CLASSE: ' . get_class($e) . PHP_EOL;
    echo 'MENSAGEM: ' . $e->getMessage() . PHP_EOL;
    echo 'ARQUIVO: ' . $e->getFile() . PHP_EOL;
    echo 'LINHA: ' . $e->getLine() . PHP_EOL;
    echo PHP_EOL;
    echo $e->getTraceAsString();
    echo '</pre>';
}
