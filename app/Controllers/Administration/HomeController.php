<?php

namespace App\Controllers\Administration;

use App\Controllers\BaseController;

class HomeController extends BaseController
{
    public function index()
    {
        $data = array (
            'title' => 'Home admin',
        );

        return view('Administration/home', $data);
    }
}
