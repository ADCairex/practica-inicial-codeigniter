<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;
use CodeIgniter\I18n\Time;

class FestivalsSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('festivals')->where('id > ', 0)->delete();
        $this->db->query('ALTER TABLE festivals AUTO_INCREMENT=1');

        $rolesBuilder = $this->db->table('festivals');

        $faker = Factory::create();

        $roles = [
            [
                'name'   => $faker->name,
                'email'      => 'admin@test.com',
                'date'   => new Time(),
                'price'       => 10,
                'address'    => $faker->address,
                'image_url'    => 'an url',
                'category_id' => 1,
                'created_at' => new Time('now', 'Europe/Madrid', 'es_ES'),
            ],
            [
                'name'   => $faker->name,
                'email'      => 'admin@test.com',
                'date'   => new Time(),
                'price'       => 10,
                'address'    => $faker->address,
                'image_url'    => 'an url',
                'category_id' => 2,
                'created_at' => new Time('now', 'Europe/Madrid', 'es_ES'),
            ],[
                'name'   => $faker->name,
                'email'      => 'admin@test.com',
                'date'   => new Time(),
                'price'       => 10,
                'address'    => $faker->address,
                'image_url'    => 'an url',
                'category_id' => 1,
                'created_at' => new Time('now', 'Europe/Madrid', 'es_ES'),
            ],
            [
                'name'   => $faker->name,
                'email'      => 'admin@test.com',
                'date'   => new Time(),
                'price'       => 10,
                'address'    => $faker->address,
                'image_url'    => 'an url',
                'category_id' => 2,
                'created_at' => new Time('now', 'Europe/Madrid', 'es_ES'),
            ],[
                'name'   => $faker->name,
                'email'      => 'admin@test.com',
                'date'   => new Time(),
                'price'       => 10,
                'address'    => $faker->address,
                'image_url'    => 'an url',
                'category_id' => 1,
                'created_at' => new Time('now', 'Europe/Madrid', 'es_ES'),
            ],
            [
                'name'   => $faker->name,
                'email'      => 'admin@test.com',
                'date'   => new Time(),
                'price'       => 10,
                'address'    => $faker->address,
                'image_url'    => 'an url',
                'category_id' => 2,
                'created_at' => new Time('now', 'Europe/Madrid', 'es_ES'),
            ],[
                'name'   => $faker->name,
                'email'      => 'admin@test.com',
                'date'   => new Time(),
                'price'       => 10,
                'address'    => $faker->address,
                'image_url'    => 'an url',
                'category_id' => 1,
                'created_at' => new Time('now', 'Europe/Madrid', 'es_ES'),
            ],
            [
                'name'   => $faker->name,
                'email'      => 'admin@test.com',
                'date'   => new Time(),
                'price'       => 10,
                'address'    => $faker->address,
                'image_url'    => 'an url',
                'category_id' => 2,
                'created_at' => new Time('now', 'Europe/Madrid', 'es_ES'),
            ],[
                'name'   => $faker->name,
                'email'      => 'admin@test.com',
                'date'   => new Time(),
                'price'       => 10,
                'address'    => $faker->address,
                'image_url'    => 'an url',
                'category_id' => 1,
                'created_at' => new Time('now', 'Europe/Madrid', 'es_ES'),
            ],
            [
                'name'   => $faker->name,
                'email'      => 'admin@test.com',
                'date'   => new Time(),
                'price'       => 10,
                'address'    => $faker->address,
                'image_url'    => 'an url',
                'category_id' => 2,
                'created_at' => new Time('now', 'Europe/Madrid', 'es_ES'),
            ],[
                'name'   => $faker->name,
                'email'      => 'admin@test.com',
                'date'   => new Time(),
                'price'       => 10,
                'address'    => $faker->address,
                'image_url'    => 'an url',
                'category_id' => 1,
                'created_at' => new Time('now', 'Europe/Madrid', 'es_ES'),
            ],
            [
                'name'   => $faker->name,
                'email'      => 'admin@test.com',
                'date'   => new Time(),
                'price'       => 10,
                'address'    => $faker->address,
                'image_url'    => 'an url',
                'category_id' => 2,
                'created_at' => new Time('now', 'Europe/Madrid', 'es_ES'),
            ],[
                'name'   => $faker->name,
                'email'      => 'admin@test.com',
                'date'   => new Time(),
                'price'       => 10,
                'address'    => $faker->address,
                'image_url'    => 'an url',
                'category_id' => 1,
                'created_at' => new Time('now', 'Europe/Madrid', 'es_ES'),
            ],
            [
                'name'   => $faker->name,
                'email'      => 'admin@test.com',
                'date'   => new Time(),
                'price'       => 10,
                'address'    => $faker->address,
                'image_url'    => 'an url',
                'category_id' => 2,
                'created_at' => new Time('now', 'Europe/Madrid', 'es_ES'),
            ],[
                'name'   => $faker->name,
                'email'      => 'admin@test.com',
                'date'   => new Time(),
                'price'       => 10,
                'address'    => $faker->address,
                'image_url'    => 'an url',
                'category_id' => 1,
                'created_at' => new Time('now', 'Europe/Madrid', 'es_ES'),
            ],
            [
                'name'   => $faker->name,
                'email'      => 'admin@test.com',
                'date'   => new Time(),
                'price'       => 10,
                'address'    => $faker->address,
                'image_url'    => 'an url',
                'category_id' => 2,
                'created_at' => new Time('now', 'Europe/Madrid', 'es_ES'),
            ],
        ];

        $rolesBuilder->insertBatch($roles);
    }
}
