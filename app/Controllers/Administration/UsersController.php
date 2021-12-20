<?php

namespace App\Controllers\Administration;

use App\Controllers\BaseController;

class UsersController extends BaseController
{
    public function index()
    {
        $data = array (
            'title' => 'Users Page',
        );

        return view('Administration/users', $data);
    }
}
