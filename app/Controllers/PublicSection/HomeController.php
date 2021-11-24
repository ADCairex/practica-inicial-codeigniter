<?php

namespace App\Controllers\PublicSection;

use App\Controllers\BaseController;

class HomeController extends BaseController
{
    public function index()
    {
        return view('PublicSection/home');
    }
}
