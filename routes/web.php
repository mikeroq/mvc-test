<?php

use App\Controllers\FormController;
use App\Controllers\HomeController;
use App\Middleware\CsrfMiddleware;
use League\Route\Router;

/**
 * @var Router $router
 */

$router->get('/', [HomeController::class, 'index'])->middleware(new CsrfMiddleware());
$router->get('/form', [FormController::class, 'index'])->middleware(new CsrfMiddleware());
$router->post('/form', [FormController::class, 'store'])->middleware(new CsrfMiddleware());