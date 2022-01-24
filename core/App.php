<?php

namespace Core;

use Laminas\Diactoros\ServerRequestFactory;
use Laminas\HttpHandlerRunner\Emitter\SapiEmitter;

class App
{
    public function run()
    {
        require_once '../routes/web.php';
        $request = ServerRequestFactory::fromGlobals(
            $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
        );
        $response = $router->dispatch($request);
        (new SapiEmitter())->emit($response);
    }
}