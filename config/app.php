<?php

namespace Config;

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

return [
    'timezone' => 'America/Chicago',
    // =========================================================================
    // DATABASE
    // =========================================================================
    'database' => [
        'DB_HOST' => $_ENV['DB_HOST'],
        'DB_USERNAME' => $_ENV['DB_USERNAME'],
        'DB_PASSWORD' => $_ENV['DB_PASSWORD'],
        'DB_DATABASE' => $_ENV['DB_DATABASE'],
        'DB_CHARSET' => $_ENV['DB_CHARSET'],
    ]
];