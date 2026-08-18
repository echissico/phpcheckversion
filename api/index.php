<?php

require __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';

echo '<pre>';

foreach ($app->getLoadedProviders() as $provider => $loaded) {
    echo $provider . ' => ' . ($loaded ? 'true' : 'false') . PHP_EOL;
}

echo '</pre>';

exit;
