<?php
namespace App\Controllers;

use Core\View;
use Laminas\Diactoros\Response;
use Laminas\Diactoros\ServerRequest;

class TestController extends Controller
{
    public function create(): Response
    {
        return View::make("test");
    }

    public function show(ServerRequest $request): Response
    {
        dd($request->getAttributes());
        return View::make("test2", compact('id'));
    }

    public function store(ServerRequest $request)
    {
        $this->validate($request);
        dd($this->request->get('test'));
    }
}

