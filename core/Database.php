<?php
namespace Core;

use Loader;

$App = Loader::file(PUBLIC_PATH.'config/app');
if(isset($App['timezone'])): date_default_timezone_set($App['timezone']); endif;

$dsn = "mysql:host=".$App['database']['DB_HOST'].";dbname=".$App['database']['DB_DATABASE'];
//$db = new Nette\Database\Connection($dsn, $App['database']['DB_USERNAME'], $App['database']['DB_PASSWORD']);
