<?php

namespace App\Controllers\Rest;

use App\Entities\Categories;
use App\Models\CategoriesModel;
use CodeIgniter\RESTful\ResourceController;
use Exception;

class CategoriesController extends ResourceController
{
    public function getCategory($id=null)
    {
        try {
            $catModel = new CategoriesModel();
            if ($id) {
                $category = $catModel->where(['id' => $id])
                                    ->first();

                if ($category) {
                    return $this->respond($category, 200, 'Categoria cargada con exito');
                } else {
                    return $this->respond('', 404, 'Categoria no encontrada');
                }
            } else {
                $catModel = new CategoriesModel();
                $categories = $catModel->findAll();

                return $this->respond($categories, 200, 'Categorias cargadas con exito');
            }
        } catch (Exception $e) {
            return $this->respond('', 500, 'Error interno del servidor');
        }
    }

    public function deleteCategory()
    {
        try {
            $catModel = new CategoriesModel();
            $request = $this->request;
            $data = $request->getJSON();
            $id = $data->id;

            $category = $catModel->where(['id' => $id])
                                ->first();

            if ($category) {
                $catModel->delete(['id' => $id]);
                return $this->respond('', 200, 'Categoria eliminada con exito');
            } else {
                return $this->respond('', 404, 'Categoria no encontrada');
            }
        } catch (Exception $e) {
            return $this->respond('', 500, 'Error interno del servidor');
        }
    }

    public function saveCategory()
    {
        try {
            $catModel = new CategoriesModel();
            $request = $this->request;
            $body = $request->getJSON();
            //Check if the id exist to edit or create a new category
            if(isset($body->id)) {
                //The id exist and this part is for edit the category
                $category = $catModel->where(['id' => $body->id])
                                    ->first();

                if ($category) {
                    $catModel->save($body);
                    return $this->respond('', 200, 'Categoria actualizada con exito');
                } else {
                    return $this->respond('', 404, 'Categoria no encontrada');
                }

            } else {
                //The id not exist and this part is for create a new category

                //set the array to create the new category
                if(isset($body->name)) {
                    $data = array(
                        "name" => $body->name
                    );
                    $newCategory = new Categories($data);
                    $catModel->save($newCategory);
                    $this->respond('', 200, 'Categoria crada con exito');
                } else  {
                    $this->respond('', 404, 'Error');
                }
            }    
        } catch (Exception $e) {
            return $this->respond('', 500, 'Error interno de servidor');
        }   
    }
}
