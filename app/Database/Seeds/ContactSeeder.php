<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class ContactSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i=0; $i < 100; $i++) { 
            $data = [
                'nama' => $faker->name(),
                'email'    => $faker->email(),
                'telepon'    => $faker->phoneNumber(),
                'pesan'    => implode($faker->sentences(4)),
                'created_at' => Time::now('Asia/Jakarta'),
                'updated_at' => Time::now('Asia/Jakarta'),
            ];
            $this->db->table('contact')->insert($data);
        }
            
        // Simple Queries
        // $this->db->query('INSERT INTO users (username, email) VALUES(:username:, :email:)', $data);

        // Using Query Builder
    }
}
