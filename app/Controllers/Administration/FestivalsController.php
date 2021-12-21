<?php

namespace App\Controllers\Administration;

use App\Controllers\BaseController;
use App\Libraries\UtilLibrary;
use App\Models\FestivalsModel;
use Exception;

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

    public function deleteFestival() {
        try {
            $request = $this->request;
            $data = $request->getJSON();
    
            $util = new UtilLibrary();
            
            $festM = new FestivalsModel();
    
            $deleted = $festM->deleteFestival($data->id);
    
            if($deleted) {
                return $util->getResponse('OK', 'Festival eliminado con exito', $request);
            } else {
                return $util->getResponse('KO', 'Error al eliminar el festival', '');
            }
        } catch (Exception $e) {
            $util = new UtilLibrary();
            return $util->getResponse('KO', 'Error del servidor', '');
        }
    }
}
