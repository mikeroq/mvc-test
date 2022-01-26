<?php
namespace App\Controllers;

use Core\View;
use Illuminate\Support\Facades\DB;
use Laminas\Diactoros\Response;

class HomeController extends Controller
{
    public function index(): Response
    {
        return View::make('welcome', [
            'basePath' => base_path(),
            'publicPath' => public_path(),
            'appPath' => app_path()
        ]);
    }
}