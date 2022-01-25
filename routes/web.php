<?php

use App\Controllers\HomeController;
use App\Middleware\IsAdmin;
use League\Route\Router;

/**
 * @var Router $router
 */

$router->get('/', [HomeController::class, 'index'])->middleware(new IsAdmin());
