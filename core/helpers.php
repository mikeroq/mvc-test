<?php


use Illuminate\Container\Container;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Foundation\Application;
use Laminas\Diactoros\Response\RedirectResponse;

if (!function_exists('config')) {
    function config($val){
        $app = include __DIR__ . '../../config/app.php';
        return $app[$val];
    }   
}

if (!function_exists('redirect')) {
	function redirect($url, $permanent = false): RedirectResponse
    {
        return new RedirectResponse($url, $permanent ? 301 : 302);
	}
}

if (!function_exists('app')) {
    /**
     * Get the available container instance.
     *
     * @param string|null $abstract
     * @param array $parameters
     * @return mixed|Application
     */
    function app(string $abstract = null, array $parameters = []): mixed
    {
        if (is_null($abstract)) {
            return Container::getInstance();
        }
        try {
            return Container::getInstance()->make($abstract, $parameters);
        } catch (BindingResolutionException $e) {

        }
    }
}

if (!function_exists('base_path')) {
    function base_path()
    {
        return app()->getBasePath();
    }
}

if (!function_exists('public_path')) {
    function public_path()
    {
        return app()->getPublicPath();
    }
}

if (!function_exists('app_path')) {
    function app_path()
    {
        return app()->getAppPath();
    }
}

if (!function_exists('csrf_token')) {
    function csrf_token(string $token = null)
    {
        if (empty($token)) {
            return app()->session()->getCsrfToken();
        } else {
            return app()->session()->checkCsrfIsValid($token);
        }
    }
}

if (!function_exists('session')) {
    function session() {
        return app()->session();
    }
}