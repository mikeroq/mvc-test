<?php

use App\Kernel;
use Core\Session;
use Symfony\Component\Security\Csrf\CsrfTokenManager;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class Extension extends AbstractExtension{

    public function getFunctions() {
        $newFunctions = [];
        $functions = [
            new TwigFunction('elapsed_time', array($this, 'elapsed_time')),
            new TwigFunction('path', array($this, 'path')),
            new TwigFunction('assets', array($this, 'assets')),
            new TwigFunction('url', array($this, 'url')),
            new TwigFunction('current_url', array($this, 'current_url')),
            new TwigFunction('custom', array($this, 'custom')),
            new TwigFunction('csrf', array($this, 'csrf')),
            new TwigFunction('error_has', array($this, 'error_has')),
            new TwigFunction('check_has', array($this, 'check_has'))
        ];
        $result = array_merge($functions, $newFunctions);
        return $result;
    }

    public function elapsed_time(){
        if (!isset($GLOBALS['PerformanceMicrotime'])) {
            return 0;
        }
        return number_format(( microtime(true) - $GLOBALS['PerformanceMicrotime']), 4);
    }

    public function path($slug = NULL, $current = NULL){
        $numero = '';
        foreach ($current as $key => $value) {
            $numero = $value;
        }
        echo $slug.'?page='.$value;
    }

    public function assets($url = NULL) {
        $root=(isset($_SERVER['HTTPS']) ? "https://" : "http://").$_SERVER['HTTP_HOST'];
        $root.= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
        $url = $root . 'assets/' . $url;
        return $url;
    }

    public function url($url = NULL) {
        $root=(isset($_SERVER['HTTPS']) ? "https://" : "http://").$_SERVER['HTTP_HOST'];
        $root.= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
        $url = $root . $url;
        return $url;
    }

    public function current_url(){
        $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        return $actual_link;
    }

    public function csrf($type = NULL){
        $easyCSRF = new CsrfTokenManager();
        $token = $easyCSRF->getToken('_token');
        if($type == 'input'){
            return '<input type="hidden" name="_token" value="'.$token.'">';
        }elseif($type == 'meta'){
            return '<meta name="_token" content="'.$token.'">';
        }else{
            return $token;
        }
    }

    public function custom($func, $params){
        $kernel = new Kernel;
        if(method_exists($kernel, $func)){
            return $kernel->$func($params);
        }else{
            return 'This function not exists';
        }
    }

    public function error_has($name){
        $session = new Session;
        $errors = $session->get('errors');
        if(isset($errors)){
            if(isset($errors[$name])){
                $temp = $errors[$name];
                unset($errors[$name]);
                $session->set('errors', $errors);
                return $temp;
            }
        }
    }

    public function check_has($name){
        $session = new Session;
        $errors = $session->get('errors');
        if(isset($errors)){
            if(isset($errors[$name])){
                $temp = $errors[$name];
                return $temp;
            }
        }
    }
}