<?php

namespace Core;

use Dotenv\Dotenv;
use Illuminate\Container\Container;
use Laminas\Diactoros\ServerRequestFactory;
use Laminas\HttpHandlerRunner\Emitter\SapiEmitter;
use League\Route\Http\Exception\NotFoundException;
use League\Route\Router;

class App extends Container
{
    protected string $basePath;
    protected array $config;

    public function __construct($basePath = null)
    {
        if ($basePath) {
            $this->basePath = $basePath;
        }
        static::setInstance($this);
        $this->instance('app', $this);
        $this->instance(Container::class, $this);
        $dotenv = Dotenv::createImmutable(static::$instance->getBasePath());
        $dotenv->load();
        $this->config = include static::$instance->getBasePath() . '/config/app.php';
    }

    public function run()
    {
        $router = new Router();
        require_once static::$instance->getBasePath() . '/routes/web.php';
        $request = ServerRequestFactory::fromGlobals(
            $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
        );
        try {
            $response = $router->dispatch($request);
        } catch (NotFoundException $exception) {
            $uri = $request->getUri();
            $response = View::make('errors.404', ['code' => '404', 'message' => 'Requested URL:<br>' . $uri . '<br>not found'])->withStatus('404');
        }
        (new SapiEmitter())->emit($response);
    }

    public function getBasePath(): string
    {
        return $this->basePath;
    }

    public function getPublicPath(): string
    {
        return $this->basePath . '/public';
    }

    public function getAppPath(): string
    {
        return $this->basePath . '/app';
    }

    public function getConfig()
    {
        return $this->config;
    }
}