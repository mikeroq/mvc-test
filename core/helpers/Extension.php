<?php

use Aura\Session\CsrfToken;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class Extension extends AbstractExtension
{

    public function getFunctions(): array
    {
        $newFunctions = [];
        $functions = [
            new TwigFunction('elapsed_time', array($this, 'elapsed_time')),
            new TwigFunction('path', array($this, 'path')),
            new TwigFunction('assets', array($this, 'assets')),
            new TwigFunction('url', array($this, 'url')),
            new TwigFunction('current_url', array($this, 'current_url')),
            new TwigFunction('csrf', array($this, 'csrf'), ['is_safe' => ['html']]),
            new TwigFunction('flash', array($this, 'flash'), ['is_safe' => ['html']])
        ];
        return array_merge($functions, $newFunctions);
    }

    public function elapsed_time(): int|string
    {
        if (!isset($GLOBALS['PerformanceMicrotime'])) {
            return 0;
        }
        return number_format((microtime(true) - $GLOBALS['PerformanceMicrotime']), 4);
    }

    public function path($slug = null, $current = null)
    {
        $numero = '';
        foreach ($current as $value) {
            $numero = $value;
        }
        echo $slug . '?page=' . $numero;
    }

    public function assets($url = null): string
    {
        $root = (isset($_SERVER['HTTPS']) ? "https://" : "http://") . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
        return $root . 'assets/' . $url;
    }

    public function url($url = null): string
    {
        $root = (isset($_SERVER['HTTPS']) ? "https://" : "http://") . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
        return $root . $url;
    }

    public function current_url(): string
    {
        return (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    }

    public function csrf($type = null): CsrfToken|string
    {
        $token = csrf_token();
        if ($type == 'input') {
            return '<input type="hidden" name="__csrf_value" value="' . $token . '">';
        } elseif ($type == 'meta') {
            return '<meta name="__csrf_value" content="' . $token . '">';
        } else {
            return $token;
        }
    }

    public function flash($key)
    {
        return session()->getFlash($key);
    }
}