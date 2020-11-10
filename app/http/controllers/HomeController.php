<?php
namespace App\Controllers;

class HomeController extends Controller {

    public function test() {
        return $this->view('test.twig');
    }
    public function test2() {
        $this->validate($this->request);
        dd($this->request);
    }
}
