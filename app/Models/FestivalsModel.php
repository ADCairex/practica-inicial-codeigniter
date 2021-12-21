<?php

namespace App\Models;

use App\Entities\Festivals;
use CodeIgniter\Model;
use Exception;

class FestivalsModel extends Model
{
    
    protected $table            = 'festivals';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = Festivals::class;
    protected $useSoftDeletes   = true;
    
    protected $allowedFields    = [
        'name',
        'email',
        'date',
        'price',
        'address',
        'image_url',
        'category_id'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function findFestivals($id) {
        if (is_null($id)) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])
                    ->first();
    }

    public function findFestivalsByCategory($categoryId) {
        return $this->where(['category_id' => $categoryId])
                    ->find();
    }

    public function findFestivalsDatatable($limitStart, $limitLenght) {
        return $this->limit($limitLenght, $limitStart)
                    ->find();
    }

    public function deleteFestival($id) {
        try {
            $this->where('id', $id)
                 ->delete();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
