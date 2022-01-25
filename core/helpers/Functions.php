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


if (!function_exists('str_slug')) {
    function str_slug($toClean = NULL){
        $toClean = trim($toClean);
        $chars = array(
	        '?' => 'S', '?' => 's', 'Ð' => 'Dj','?' => 'Z', '?' => 'z', 'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A',
	        'Å' => 'A', 'Æ' => 'A', 'Ç' => 'C', 'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I',
	        'Ï' => 'I', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U',
	        'Û' => 'U', 'Ü' => 'U', 'Ý' => 'Y', 'Þ' => 'B', 'ß' => 'Ss','à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a',
	        'å' => 'a', 'æ' => 'a', 'ç' => 'c', 'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i',
	        'ï' => 'i', 'ð' => 'o', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ø' => 'o', 'ù' => 'u',
	        'ú' => 'u', 'û' => 'u', 'ý' => 'y', 'ý' => 'y', 'þ' => 'b', 'ÿ' => 'y', 'ƒ' => 'f', ',' => '',  '.' => '',  ':' => '',
	        ';' => '',  '_' => '',  '<' => '',  '>' => '',  '\\'=> '',  'ª' => '',  'º' => '',  '!' => '',  '|' => '',  '"' => '',
	        '@' => '',  '·' => '',  '#' => '',  '$' => '',  '~' => '',  '%' => '',  '€' => '',  '&' => '',  '¬' => '',  '/' => '',
	        '(' => '',  ')' => '',  '=' => '',  '?' => '',  '\''=> '',  '¿' => '',  '¡' => '',  '`' => '',  '+' => '',  '´' => '',
	        'ç' => '',  '^' => '',  '*' => '',  '¨' => '',  'Ç' => '',  '[' => '',  ']' => '',  '{' => '',  '}' => '',  '? '=> '-',
	    );
		$toClean = str_replace('&', '-and-', $toClean);
		$toClean = str_replace('.', '', $toClean);
		$toClean = strtolower(strtr($toClean, $chars));
		$toClean = str_replace(' ', '-', $toClean);
		$toClean = str_replace('--', '-', $toClean);
		$toClean = str_replace('--', '-', $toClean);
		$toClean = preg_replace('/[^\w\d_ -]/si', '', $toClean);
		return $toClean;
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
     * @throws BindingResolutionException
     */
    function app(string $abstract = null, array $parameters = []): mixed
    {
        if (is_null($abstract)) {
            return Container::getInstance();
        }
        return Container::getInstance()->make($abstract, $parameters);
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