<?php

namespace App\Controllers\PublicSection;

use App\Controllers\BaseController;
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
        $request = $this->request;

        $user = $request->getVar('user-email');
        $pass = $request->getVar('pass');

        $userModel = new UsersModel();

        $response = array(
            "status"=>'',
            "message"=>'',
            "data"=>''
        );

        $userInfo = $userModel->checkUserExist($user);

        if ($userInfo != null) {
            $response['status'] = 'OK';
            $response['message'] = 'User found';
            return json_encode($response);
        } else {
            $response['status'] = 'KO';
            $response['message'] = 'User or pass not found';
            return json_encode($response);
        }
    }
}
