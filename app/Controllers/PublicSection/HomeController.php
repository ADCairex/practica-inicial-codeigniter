<?php

namespace App\Controllers\PublicSection;

use App\Controllers\BaseController;

class HomeController extends BaseController
{
    public function index()
    {
        $data = array (
            'title' => 'Inicio',
        );

        return view('PublicSection/home', $data);
    }
}
