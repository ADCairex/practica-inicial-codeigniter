<?php

namespace App\Controllers\Administration;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class UsersController extends BaseController
{
    public function index()
    {
        $data = array (
            'title' => 'Users Page',
        );

        return view('Administration/users', $data);
    }

    public function getUsersData() {

        header('Access-Control-Allow-Origin: *');
        
        $request = $this->request;

        //Obtenemos datos que enviía el datatable y que vamos a necesitar
        $limitStart = $request->getVar("start");
        $limitLenght = $request->getVar("length");
        $draw = $request->getVar("draw");

        $userM = new UsersModel();

        //Obtenemos los elementos que queremos mostrar
        $festivals = $userM->findUsersDatatable($limitStart, $limitLenght);

        //Obtenemos los elemenots totales de la tabla
        $totalRecords = $userM->countAllResults();

        $json_data = array(
            "draw" => $draw, 
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $totalRecords,
            "data" => $festivals,
        );

        return json_encode($json_data);
    }
}
