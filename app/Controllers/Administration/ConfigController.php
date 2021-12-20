<?php

namespace App\Controllers\Administration;

use App\Controllers\BaseController;

class ConfigController extends BaseController
{
    public function index()
    {
        $data = array (
            'title' => 'Categoriers page',
        );

        return view('Administration/categories', $data);
    }
}
