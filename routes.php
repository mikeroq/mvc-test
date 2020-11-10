<?php
$router->get('/', '\App\Controllers\HomeController@test');
$router->get('/about', function() {
    echo 'About';
});