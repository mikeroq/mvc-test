<?php

namespace Core;

use Bramus\Router\Router;
use Core\Request;

class AppRouter extends Router
{
    private static ?AppRouter $instance = null;

    private function __construct()
    {
    }

    public static function getInstance(): AppRouter
    {
        if (is_null(static::$instance)) {
            static::$instance = new AppRouter();
        }
        return static::$instance;
    }

    public function group($route, $params)
    {
        $this->mount($route, $params);
    }

    public function error($params)
    {
        $this->set404($params);
    }

    public function redirect($url, $permanent = false)
    {
        if (headers_sent() === false) {
            header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
        }
        return exit();
    }

    public function middleware($pattern = null, $fn = null)
    {
        $uri = $this->getCurrentUri();
        if (str_contains($pattern, '*')) {
            $pattern = str_replace('*', '', $pattern);
            if (str_contains($uri, $pattern)) {
                $this->invokeController($pattern, $fn, $uri);
            }
        } elseif ($uri == $pattern) {
            $this->invokeController($pattern, $fn, $uri);
        }
    }



//    private function invokeController($pattern, $fn, $uri)
//    {
//        if (is_callable($fn)) {
//            call_user_func_array($fn, []);
//        } else {
//            $pattern = preg_replace('/{([A-Za-z]*?)}/', '(\w+)', $pattern);
//            if (preg_match_all('#^' . $pattern . '$#', $uri, $matches, PREG_OFFSET_CAPTURE)) {
//                if (stripos($fn, '@') !== false) {
//                    list($controller, $method) = explode('@', $fn);
//                    $controller = 'App\\Middleware\\' . $controller;
//                    if (class_exists($controller)) {
//                        if (call_user_func_array(array(new $controller(), $method), []) === false) {
//                            forward_static_call_array(array($controller, $method), []);
//                        }
//                    }
//                }
//            }
//        }
//    }
}