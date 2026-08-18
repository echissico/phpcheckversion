<?php

use Illuminate\Http\Request;

header('Content-Type: text/plain');

try {
    echo "1. START\n";

    require __DIR__.'/../vendor/autoload.php';

    echo "2. AUTOLOAD OK\n";

    $app = require_once __DIR__.'/../bootstrap/app.php';

    echo "3. BOOTSTRAP OK\n";

    $app->register(\Illuminate\View\ViewServiceProvider::class);

    echo "4. VIEW PROVIDER OK\n";

    $request = Request::capture();

    echo "5. REQUEST OK\n";

    $kernel = $app->make(\Illuminate\Contracts\Http\Kernel::class);

    echo "6. KERNEL OK\n";

    $response = $kernel->handle($request);

    echo "7. HANDLE OK\n";

    echo "STATUS: ".$response->getStatusCode()."\n";

    echo "BODY:\n";
    echo $response->getContent();

    $kernel->terminate($request, $response);

} catch (\Throwable $e) {

    echo "\n\n=== EXCEPTION ===\n";
    echo "CLASS: ".get_class($e)."\n";
    echo "MESSAGE: ".$e->getMessage()."\n";
    echo "FILE: ".$e->getFile()."\n";
    echo "LINE: ".$e->getLine()."\n\n";
    echo $e->getTraceAsString();
}
