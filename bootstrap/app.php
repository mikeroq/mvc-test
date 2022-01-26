<?php

use Core\App;
use Spatie\Ignition\Ignition;

Ignition::make()->useDarkMode()->register();

$app = new App(dirname(__DIR__));

Illuminate\Support\Facades\Facade::setFacadeApplication($app);

$app->singleton('db', function () use ($app) {
    $capsule = new Illuminate\Database\Capsule\Manager();

    $capsule->addConnection([
        'driver' => $app->getConfig()['DATABASE']['DB_DRIVER'],
        'host' => $app->getConfig()['DATABASE']['DB_HOST'],
        'database' => $app->getConfig()['DATABASE']['DB_DATABASE'],
        'username' => $app->getConfig()['DATABASE']['DB_USERNAME'],
        'password' => $app->getConfig()['DATABASE']['DB_PASSWORD'],
        'charset' => $app->getConfig()['DATABASE']['DB_CHARSET'],
        'collation' => 'utf8mb4_general_ci',
        'prefix' => '',
    ]);

    $capsule->setAsGlobal();
    $capsule->bootEloquent();

    return $capsule;
});

return $app;
