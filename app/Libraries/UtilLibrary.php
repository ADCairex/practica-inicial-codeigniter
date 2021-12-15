<?php

namespace App\Libraries;

use App\Models\RolesModel;

class UtilLibrary {
    
    public function getResponse($status='', $message='', $data='') {
        $response = array(
            'status'  => $status,
            'message' => $message,
            'data'    => $data
        );

        return json_encode($response);
    }

    public function checkUserAdmin($user) {
        $rolesModel = new RolesModel();


    }

}