<?php

namespace App\Controllers\Administration;

use App\Controllers\BaseController;
use App\Entities\Users;
use App\Libraries\UtilLibrary;
use App\Models\UsersModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use Exception;

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

    public function deleteUser() {
        try {
            $request = $this->request;
            $data = $request->getJSON();
    
            $util = new UtilLibrary();
            
            $userM = new UsersModel();
    
            $deleted = $userM->deleteUser($data->id);
    
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

    public function viewEditUser($id='') {
        try {
            if ($id == '') {

                $data = array(
                    'title'    => 'Nuevo usuario',
                    'user' => new Users()
                );
            } else {
                $userM = new UsersModel();
                $user = $userM->find($id);

                if (is_null($user)) {
                    throw PageNotFoundException::forPageNotFound();
                }

                $data = array(
                    'title'    => 'Editar usuario',
                    'festival' => $user
                );
            }
            return view('Administration/festivals_edit', $data);
        } catch (Exception $e) {

        }
    }
}
