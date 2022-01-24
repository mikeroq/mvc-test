<?php

use Core\App;
use Spatie\Ignition\Ignition;

session_start();
require_once '../vendor/autoload.php';

Ignition::make()->useDarkMode()->register();

$app = new App();
$app->run();