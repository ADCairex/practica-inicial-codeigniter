<?php

namespace App\Controllers\PublicSection;

use App\Controllers\BaseController;
use App\Libraries\UtilLibrary;
use App\Models\UsersModel;


class LoginController extends BaseController
{

    public function index()
    {
        $data = array (
            'title' => 'Login',
        );

        return view('PublicSection/login', $data);
    }

    public function checkLogin()
    {
        $util = new UtilLibrary();
        $request = $this->request;

        $user = $request->getVar('user-email');
        $pass = $request->getVar('pass');

        $userModel = new UsersModel();


        $userInfo = $userModel->checkUserExist($user);

        if ($userInfo != null) {
            return $util->getResponse('OK', 'Login correcto');
        } else {
            return $util->getResponse('Ko', 'Login incorrecto');
        }
    }
}
