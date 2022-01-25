<?php

namespace Core;

use Illuminate\Container\Container;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;

class Database
{
    public function __construct()
    {
        $capsule = new Capsule();
        $capsule->addConnection([
            'driver' => app()->getConfig()['DATABASE']['DB_DRIVER'],
            'host' => app()->getConfig()['DATABASE']['DB_HOST'],
            'database' => app()->getConfig()['DATABASE']['DB_DATABASE'],
            'username' => app()->getConfig()['DATABASE']['DB_USERNAME'],
            'password' => app()->getConfig()['DATABASE']['DB_PASSWORD'],
            'charset' => app()->getConfig()['DATABASE']['DB_CHARSET'],
            'collation' => 'utf8mb4_general_ci',
            'prefix' => '',
        ]);
        $capsule->setEventDispatcher(new Dispatcher(new Container()));
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }
}