<?php

namespace App\Controllers\Administration;

use App\Controllers\BaseController;
use App\Entities\Categories;
use App\Libraries\UtilLibrary;
use App\Models\CategoriesModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use Exception;

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

    public function deleteCategory() {
        try {
            $request = $this->request;
            $data = $request->getJSON();

            $util = new UtilLibrary();

            $catM = new CategoriesModel();

            $deleted = $catM->deleteCategory($data->id);

            if($deleted) {
                return $util->getResponse('OK', 'Categoria eliminada con exito', $request);
            } else {
                return $util->getResponse('KO', 'Error al eliminar la categoria', '');
            }
        } catch (Exception $e) {
            $util = new UtilLibrary();
            return $util->getResponse('KO', 'Error del servidor', '');
        }
    }

    public function viewEditCategory($id='') {
        try {
            if ($id == '') {

                $data = array(
                    'title'    => 'Nueva Categoria',
                    'category' => new Categories()
                );
            } else {
                $catM = new CategoriesModel();
                $category = $catM->find($id);

                if (is_null($category)) {
                    throw PageNotFoundException::forPageNotFound();
                }

                $data = array(
                    'title'    => 'Editar categoria',
                    'category' => $category
                );
            }
            return view('Administration/categories_edit', $data);
        } catch (Exception $e) {

        }
    }

    public function saveCategory() {
        $util = new UtilLibrary();
        
        try {
            $request = $this->request;
            $catM = new CategoriesModel();

            $data = [
                'id' => $request->getVar('id'),
                'name' => $request->getvar('name')
            ];

            if(strcmp($data["id"],"")!==0) {
                $category = $catM->findCategories($data['id']);

                if(is_null($category)) {
                    return $util->getResponse('KO_NOT_FOUND', 'El festival no existe');
                }
            } else {
                $category = new Categories();
            }

            $category->fill($data);
            $catM->save($category);

            return $util->getResponse('OK', 'Festival guardado correctamente', $data);
        } catch (Exception $e) {
            return $util->getResponse('KO', 'Error interno del servidor', '');
        }
    }
}
