<?php

use Core\App;
use Spatie\Ignition\Ignition;

Ignition::make()->useDarkMode()->register();

return new App(dirname(__DIR__));