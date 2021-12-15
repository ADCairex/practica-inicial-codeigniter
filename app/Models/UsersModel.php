<?php

namespace App\Models;

use App\Entities\Users;
use CodeIgniter\Model;
use phpDocumentor\Reflection\PseudoTypes\False_;

class UsersModel extends Model
{
    
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = Users::class;
    protected $useSoftDeletes   = true;
    
    protected $allowedFields    = [
        'username',
        'email',
        'password',
        'name',
        'surname',
        'role_id'
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

    public function getUserData($user) {
        $result = $this->where(['username' => $user])
                       ->orWhere(['email' => $user])
                       ->first();
        
        return $result;
    }
}
