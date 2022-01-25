<?php

use App\Controllers\HomeController;
use App\Controllers\TestController;
use App\Middleware\IsAdmin;
use League\Route\Router;

/**
 * @var Router $router
 */

$router->get('/', [HomeController::class, 'index'])->middleware(new IsAdmin());
$router->get('/test', [TestController::class, 'create']);
$router->post('/test', [TestController::class, 'store']);
$router->get('/test/{id}', [TestController::class, 'show']);