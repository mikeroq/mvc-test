<?php
namespace App\Controllers;

class TestController extends Controller
{
    public function test()
    {
        return $this->view("test");
    }
    public function test2()
    {
        $this->validate($this->request);
        dd($this->request->get('test'));
    }
}

