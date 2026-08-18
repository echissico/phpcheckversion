<?php

header('Content-Type: text/plain');

echo "API INDEX OK\n";
echo "PHP VERSION: " . PHP_VERSION . "\n";
echo "TMP WRITABLE: " . (is_writable('/tmp') ? 'YES' : 'NO') . "\n";
