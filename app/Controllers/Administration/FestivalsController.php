<?php

namespace App\Controllers\Administration;

use App\Controllers\BaseController;

class FestivalsController extends BaseController
{
    public function index()
    {
        $data = array (
            'title' => 'Festivals page',
        );
        
        return view('Administration/festivals', $data);
    }
}
