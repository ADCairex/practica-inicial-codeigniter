<?php

namespace App\Controllers\Administration;

use App\Controllers\BaseController;

class HomeController extends BaseController
{
    public function index()
    {
        return view('Administration/home');
    }
}
