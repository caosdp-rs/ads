<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }
    public function relogio()
    {
        return view('relogio');
    }
    public function cronometro()
    {
        return view('cronometro');
    }
}
