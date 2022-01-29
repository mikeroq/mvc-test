<?php
namespace App\Controllers;

use Core\View;
use Laminas\Diactoros\Response;
use Laminas\Diactoros\ServerRequest;

class FormController extends Controller
{
    public function index(ServerRequest $request): Response
    {
        return View::make('form');
    }

    public function store(ServerRequest $request): Response
    {
        session()->flash('message', 'Testing 1 2 3');
        return redirect('/');
//        return View::make('form',['post'=>$request->getParsedBody()]);
    }
}