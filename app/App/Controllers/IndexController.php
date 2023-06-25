<?php

namespace App\Controllers;

use Core\Controller;

class IndexController extends Controller
{
    public function index()
    {
        view('index/main');
    }

    public function contacts(): void
    {
        view('index/contacts');
    }

}
