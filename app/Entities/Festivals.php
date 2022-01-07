<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;
use DateTime;

class Festivals extends Entity
{
    protected $attributes = [
        'id'          => null,
        'name'        => null,
        'email'       => null,
        'date'        => null,
        'price'       => null,
        'address'     => null,
        'image_url'   => null,
        'category_id' => null,
    ];

    protected $datamap = [];
    protected $dates   = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    protected $casts   = [];

    public function getInputFormatDate() {
        $newDate = date_create($this->date);
        return date_format($newDate, 'Y-m-d');
    }
}
