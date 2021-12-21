<?php

namespace App\Controllers\Administration;

use App\Controllers\BaseController;
use App\Models\RolesModel;

class RolesController extends BaseController
{
    public function index()
    {
        $data = array (
            'title' => 'Roles Page',
        );

        return view('Administration/roles', $data);
    }

    public function getRolesData() {

        header('Access-Control-Allow-Origin: *');
        
        $request = $this->request;

        //Obtenemos datos que enviía el datatable y que vamos a necesitar
        $limitStart = $request->getVar("start");
        $limitLenght = $request->getVar("length");
        $draw = $request->getVar("draw");

        $rolesM = new RolesModel();

        //Obtenemos los elementos que queremos mostrar
        $festivals = $rolesM->findRolesDatatable($limitStart, $limitLenght);

        //Obtenemos los elemenots totales de la tabla
        $totalRecords = $rolesM->countAllResults();

        $json_data = array(
            "draw" => $draw, 
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $totalRecords,
            "data" => $festivals,
        );

        return json_encode($json_data);
    }
}
