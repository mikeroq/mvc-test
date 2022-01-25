<?php

return [
    'TIMEZONE' => 'America/Chicago',
    // =========================================================================
    // DATABASE
    // =========================================================================
    'DATABASE' => [
        'DB_DRIVER' => $_ENV['DB_DRIVER'],
        'DB_HOST' => $_ENV['DB_HOST'],
        'DB_USERNAME' => $_ENV['DB_USERNAME'],
        'DB_PASSWORD' => $_ENV['DB_PASSWORD'],
        'DB_DATABASE' => $_ENV['DB_DATABASE'],
        'DB_CHARSET' => $_ENV['DB_CHARSET'],
    ]
];