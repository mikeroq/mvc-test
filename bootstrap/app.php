<?php

use Core\App;
use Core\Database;
use Spatie\Ignition\Ignition;


Ignition::make()->useDarkMode()->register();

$app = new App(dirname(__DIR__));

$app->singleton('db', function () {
    return Database::boot();
});

return $app;
