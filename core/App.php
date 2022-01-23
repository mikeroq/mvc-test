<?php
namespace Core;


class App{
    public function run(){
        // =====================================================================
        // Errors
        // =====================================================================
        
        // =====================================================================
        // Routes
        // =====================================================================
        $router = AppRouter::getInstance();
        $router->setNamespace('\App\Controllers');
        require_once PUBLIC_PATH.'route/web.php';
        $router->error('ErrorController@index');
        $router->run();
    }
}