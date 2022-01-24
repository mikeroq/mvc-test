<?php
namespace App\Controllers;

use Core\View;
use Laminas\Diactoros\Response;

class HomeController extends Controller
{
    public function index(): Response
    {
        return View::make('welcome');
    }
}