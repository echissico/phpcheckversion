<?php

header('Content-Type: application/json');

echo json_encode([
    'mensagem' => 'Olá! PHP funcionando no Vercel.',
    'versao_php' => PHP_VERSION
]);