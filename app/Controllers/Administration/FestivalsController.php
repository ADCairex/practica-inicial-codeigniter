<?php

namespace App\Controllers\Administration;

use App\Controllers\BaseController;
use App\Models\FestivalsModel;

class FestivalsController extends BaseController
{
    public function index()
    {
        $data = array (
            'title' => 'Festivals page',
        );
        
        return view('Administration/festivals', $data);
    }

    public function getFestivalsData() {

        header('Access-Control-Allow-Origin: *');
        
        $request = $this->request;

        //Obtenemos datos que enviía el datatable y que vamos a necesitar
        $limitStart = $request->getVar("start");
        $limitLenght = $request->getVar("length");
        $draw = $request->getVar("draw");

        $festM = new FestivalsModel();

        //Obtenemos los elementos que queremos mostrar
        $festivals = $festM->findFestivalsDatatable($limitStart, $limitLenght);

        //Obtenemos los elemenots totales de la tabla
        $totalRecords = $festM->countAllResults();

        $json_data = array(
            "draw" => $draw, 
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $totalRecords,
            "data" => $festivals,
        );

        return json_encode($json_data);
    }
}
