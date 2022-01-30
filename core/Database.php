<?php

namespace Core;

use Illuminate\Database\Capsule\Manager;

class Database
{
    public static function boot(): Manager
    {
        $capsule = new Manager();

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

        $capsule->setAsGlobal();
        $capsule->bootEloquent();

        return $capsule;
    }
}