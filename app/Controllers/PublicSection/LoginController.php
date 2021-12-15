<?php

namespace App\Controllers\PublicSection;

use App\Controllers\BaseController;
use App\Libraries\UtilLibrary;
use App\Models\RolesModel;
use App\Models\UsersModel;
use CodeIgniter\I18n\Time;
use Config\UserProfiles;

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
        $roleModel = new RolesModel();

        $userData = $userModel->getUserData($user);

        //Check if user or email exist
        if ($userData != null) {
            if (password_verify($pass, $userData->password)) {

                $isAdmin = $roleModel->userIsAdmin($userData);

                
                //Create the session
                $session = session();

                $data = [
                    'username' => $userData->username,
                    'email'    => $userData->email,
                    'role'     => $isAdmin ? UserProfiles::ADMIN_ROLE : UserProfiles::APP_CLIENT_ROLE,
                    'date'     => new Time()
                ];
                
                //Set the data to the session
                $session->set($data);

                return $util->getResponse('OK', 'Login correcto', $data);
            } else {
                return $util->getResponse('KO', 'Login incorrecto');
            }

        } else {
            return $util->getResponse('KO', 'Login incorrecto');
        }
    }
}
