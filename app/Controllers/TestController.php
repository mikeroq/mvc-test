<?php
namespace App\Controllers;

use Core\View;
use Core\Request;
use Laminas\Diactoros\Response;

class TestController extends Controller
{
    public function create(): Response
    {
        return View::make("test");
    }

    public function show(Request $request): Response
    {
        dd($request->getAttributes());
        return View::make("test2", compact('id'));
    }

    public function store(Request $request)
    {
        dd($this->request->get('test'));
    }
}