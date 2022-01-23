<?php

use Core\AppRouter;

$route = AppRouter::getInstance();
$route->get('/', 'HomeController@index');
$route->get('/test', 'TestController@test');
$route->post('/test', 'TestController@test2');