<?php
namespace App\Controllers;

use Core\Request;

class TestController extends Controller
{
    public function create()
    {
        return $this->view("test");
    }

    public function item($id)
    {
        return $this->view("test2", compact('id'));
    }

    public function store(Request $request)
    {
        $this->validate($request);
        dd($this->request->get('test'));
    }
}

