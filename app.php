<?php

use Core\App;
use Spatie\Ignition\Ignition;

const PUBLIC_PATH = __DIR__ . "/";

if (!isset($_SESSION)): @session_start(); endif;
require_once PUBLIC_PATH.'vendor/autoload.php';

Ignition::make()->useDarkMode()->register();

//Loader::file(PUBLIC_PATH.'core/Database');
//Loader::file(PUBLIC_PATH.'core/Model');
//Loader::file(PUBLIC_PATH.'core/Session');
//Loader::file(PUBLIC_PATH.'core/Request');
//Loader::file(PUBLIC_PATH.'core/Response');
//Loader::file(PUBLIC_PATH.'core/Validator');
//Loader::file(PUBLIC_PATH.'core/BaseController');
//Loader::folder(PUBLIC_PATH.'app');
//Loader::file(PUBLIC_PATH.'core/App');
$app = new App;
$app->run();