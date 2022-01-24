<?php

use Core\AppRouter;

$route = AppRouter::getInstance();
$route->get('/', 'HomeController@index');
$route->get('/test', 'TestController@create');
$route->get('/test/{id}', 'TestController@item');
$route->post('/test', 'TestController@store');