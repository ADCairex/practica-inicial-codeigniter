<?php

namespace App\Controllers\PublicSection;

use App\Controllers\BaseController;

class LoginController extends BaseController
{
    public function index()
    {
        return view('PublicSection/login');
    }
}
