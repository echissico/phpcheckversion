<?php

echo 'ola my testing the version of php';
phpinfo();
header('Content-Type: application/json');

echo json_encode([
    'mensagem' => 'Olá! PHP funcionando no Vercel.',
    'versao_php' => PHP_VERSION
]);