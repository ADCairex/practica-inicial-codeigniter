<?php

namespace App\Controllers\Administration;

use App\Controllers\BaseController;
use App\Entities\Festivals;
use App\Models\FestivalsModel;
use CodeIgniter\I18n\Time;

class HomeController extends BaseController
{
    public function index()
    {
        $data = array (
            'title' => 'Home admin',
        );

        $festData = array (
            'name' => 'Una categoria nueva',
            'email' => 'Un email',
            'date' => new Time(),
            'prices' => 10,
            'address' => 'Una direccion',
            'image_url' => 'Una url',
            'category_id' => 1,
        );

        $fest = new Festivals($festData);

        $festModel = new FestivalsModel();
        //$festModel->save($fest);

        echo dd($festModel->findFestivals(1));

        //return view('Administration/home', $data);
    }
}
