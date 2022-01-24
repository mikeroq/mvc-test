<?php

use App\Controllers\HomeController;
use App\Controllers\TestController;
use League\Route\Router;

$router = new Router();

$router->get('/', [HomeController::class, 'index']);
$router->get('/test', [TestController::class, 'create']);
$router->post('/test', [TestController::class, 'store']);
$router->get('/test/{id}', [TestController::class, 'show']);
