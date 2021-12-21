<?php

namespace App\Controllers\Administration;

use App\Controllers\BaseController;
use App\Models\CategoriesModel;

class CategoriesController extends BaseController
{
    public function index()
    {
        $data = array (
            'title' => 'Categories Page',
        );

        return view('Administration/categories', $data);
    }

    public function getCategoriesData() {

        header('Access-Control-Allow-Origin: *');
        
        $request = $this->request;

        //Obtenemos datos que enviía el datatable y que vamos a necesitar
        $limitStart = $request->getVar("start");
        $limitLenght = $request->getVar("length");
        $draw = $request->getVar("draw");

        $catM = new CategoriesModel();

        //Obtenemos los elementos que queremos mostrar
        $festivals = $catM->findCategoriesDatatable($limitStart, $limitLenght);

        //Obtenemos los elemenots totales de la tabla
        $totalRecords = $catM->countAllResults();

        $json_data = array(
            "draw" => $draw, 
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $totalRecords,
            "data" => $festivals,
        );

        return json_encode($json_data);
    }
}
