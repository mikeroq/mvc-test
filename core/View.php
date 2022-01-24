<?php

namespace Core;

use Extension;
use Laminas\Diactoros\Response;
use Twig\Environment;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;

class View
{
    public static ?View $instance = null;
    protected Environment $template;
    public Request $request;
    public Response $response;

    public function __construct()
    {
        if (!isset($GLOBALS['PerformanceMicrotime'])) {
            $GLOBALS['PerformanceMicrotime'] = microtime(true);
        }
        $loader = new FilesystemLoader('../resources/views');
        $this->template = new Environment($loader, array(
            'cache' => realpath( '../storage/cache/views/'),
            'debug' => true,
            'charset' => 'utf8'
        ));
        $this->template->addExtension(new DebugExtension());
        $this->template->addExtension(new Extension());
    }

    public static function make($path = '', $params = []): Response
    {
        if (is_null(static::$instance)) {
            static::$instance = new View();
        }

        try {
            $body = static::$instance->template->render(str_replace('.', '/', $path) . '.twig', $params);
            $response = new Response();
            $response->getBody()->write($body);
            return $response->withStatus(200);
        } catch (\Exception $e) {

        }
    }
}