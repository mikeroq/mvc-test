<?php declare(strict_types=1);
session_start();
require_once '../vendor/autoload.php';

$app = require_once __DIR__ . "/../bootstrap/app.php";

$app->run();