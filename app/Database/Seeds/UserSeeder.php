<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class UserSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i=0; $i < 100; $i++) { 
            $data = [
                'nama' => $faker->name(),
                'email'    => $faker->email(),
                'username'    => $faker->userName(),
                'password'    => $faker->password(),
                'role'    => $faker->randomElement(['pengunjung', 'admin']),
                'created_at' => Time::now('Asia/Jakarta'),
                'updated_at' => Time::now('Asia/Jakarta'),
            ];
            $this->db->table('user')->insert($data);
        }

        // Simple Queries
        // $this->db->query('INSERT INTO users (username, email) VALUES(:username:, :email:)', $data);

        // Using Query Builder
    }
}
