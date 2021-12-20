<?php

namespace App\Models;
use App\Entities\Roles;
use CodeIgniter\Model;
use Config\UserProfiles;

class RolesModel extends Model
{
    
    protected $table            = 'roles';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = Roles::class;
    protected $useSoftDeletes   = true;
    
    protected $allowedFields    = [
        'name',
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

    public function userIsAdmin($user) {
        $result = $this->where(['id' => $user->role_id])
                       ->first();
        
        if ($result->name == UserProfiles::ADMIN_ROLE) {
            return true;
        }

        return false;        
    }
}
