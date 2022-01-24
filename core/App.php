<?php

namespace Core;


class App
{
    public function run()
    {
        $router = AppRouter::getInstance();
        $router->setNamespace('\App\Controllers');
        require_once PUBLIC_PATH . 'routes/web.php';
        $router->error('ErrorController@index');
        $router->run();
    }
}