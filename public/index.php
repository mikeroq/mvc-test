<?php declare(strict_types=1);
session_start();

// Gotta have that composer autoloader baby
require_once __DIR__ . '/../vendor/autoload.php';

// Run the application
$app = require_once __DIR__ . '/../bootstrap/app.php';
$app->run();