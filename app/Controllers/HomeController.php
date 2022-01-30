<?php
namespace App\Controllers;

use App\Models\Test;
use Core\View;
use Laminas\Diactoros\Response;
use Laminas\Diactoros\ServerRequest;

class HomeController extends Controller
{
    public function index(ServerRequest $request): Response
    {
        dd(Test::all());
        return View::make('welcome', [
            'basePath' => base_path(),
            'publicPath' => public_path(),
            'appPath' => app_path(),
            'server' => $_SERVER['SERVER_SOFTWARE']
        ]);
    }
}