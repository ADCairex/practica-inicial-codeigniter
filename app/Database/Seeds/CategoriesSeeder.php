<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;
use Faker\Factory;

class CategoriesSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('categories')->where('id > ', 0)->delete();
        $this->db->query('ALTER TABLE categories AUTO_INCREMENT=1');

        $rolesBuilder = $this->db->table('categories');

        $faker = Factory::create();

        $roles = [
            [
                'name'   => $faker->name,
                'created_at' => new Time('now', 'Europe/Madrid', 'en_US'),
            ],
            [
                'name'   => $faker->name,
                'created_at' => new Time('now', 'Europe/Madrid', 'en_US'),
            ],
        ];

        $rolesBuilder->insertBatch($roles);
    }
}
