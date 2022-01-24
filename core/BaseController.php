<?php

namespace Core;

use Exception;
use Extension;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;

class BaseController
{

    protected Environment $template;
    public Request $request;
    public Response $response;

    public function __construct()
    {
        if (!isset($GLOBALS['PerformanceMicrotime'])) {
            $GLOBALS['PerformanceMicrotime'] = microtime(true);
        }
        $loader = new FilesystemLoader(PUBLIC_PATH . '/resource/views');
        $this->template = new Environment($loader, array(
            'cache' => realpath(PUBLIC_PATH . 'storage/cache/views/'),
            'debug' => true,
            'charset' => 'utf8'
        ));
        $this->template->addExtension(new DebugExtension());
        $this->template->addExtension(new Extension());
        $this->request = Request::all();
        $this->response = new Response(
            'Content',
            Response::HTTP_OK,
            ['content-type' => 'text/html']
        );
    }

    public function getPage($request)
    {
        $page = @$request->get("page");
        if (isset($page)) {
            if (is_numeric($page)) {
                return $page;
            } else {
                redirect('/error');
            }
        } else {
            return 1;
        }
    }

    /**
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     */
    public function view($path = '', $params = [])
    {
        echo $this->template->render(str_replace('.', '/', $path) . '.twig', $params);
    }

    public function error(): string
    {
        header('HTTP/1.1 404 Not Found');
        return $this->view('errors.404.twig');
    }

    /**
     * @throws Exception
     */
    public function validate($request, $arr = [])
    {
        Validator::request($request, $arr);
    }

    /**
     * @throws Exception
     */
    public function error_has($name)
    {
        $session = new Session();
        $errors = $session->get('errors');
        if (isset($errors)) {
            if (isset($errors[$name])) {
                $temp = $errors[$name];
                unset($errors[$name]);
                $session->set('errors', $errors);
                throw new Exception($temp);
            }
        }
    }
}