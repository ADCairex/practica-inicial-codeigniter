<?php

namespace App\Controllers\Administration;

use App\Controllers\BaseController;
use App\Entities\Festivals as EntitiesFestivals;
use App\Libraries\UtilLibrary;
use App\Models\CategoriesModel;
use App\Models\FestivalsModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use Exception;

use function PHPUnit\Framework\isNull;

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

    public function viewEditFestival($id='') {
        try {
            $catM = new CategoriesModel();
            if ($id == '') {

                $data = array(
                    'title'    => 'Nuevo festival',
                    'festival' => new EntitiesFestivals(),
                    'categories' => $catM->findCategories()
                );
            } else {
                $festM = new FestivalsModel();
                $festival = $festM->find($id);

                if (is_null($festival)) {
                    throw PageNotFoundException::forPageNotFound();
                }

                $data = array(
                    'title'    => 'Editar festival',
                    'festival' => $festival,
                    'categories' => $catM->findCategories()
                );
            }
            return view('Administration/festivals_edit', $data);
        } catch (Exception $e) {

        }
    }

    public function saveFestival() {
        $util = new UtilLibrary();
        
        try {
            $request = $this->request;
            $festM = new FestivalsModel();

            $data = [
                'id' => $request->getVar('id'),
                'name' => $request->getvar('name'),
                'email' => $request->getVar('email'),
                'date' => $request->getVar('date'),
                'price' => $request->getVar('price'),
                'address' => $request->getVar('address'),
                'image_url' => $request->getVar('image_url'),
                'category_id' => $request->getVar('category_id')
            ];

            if(strcmp($data["id"],"")!==0) {
                $festival = $festM->findFestivals($data['id']);

                if(is_null($festival)) {
                    return $util->getResponse('KO_NOT_FOUND', 'El festival no existe');
                }
            } else {
                $festival = new EntitiesFestivals();
            }

            $festival->fill($data);
            $festM->save($festival);

            return $util->getResponse('OK', 'Festival guardado correctamente', $data);
        } catch (Exception $e) {
            return $util->getResponse('KO', 'Error interno del servidor', '');
        }
    }
}
