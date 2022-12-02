<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Factory::create();

        $count = 1;
        while ($count <= 10) {
            $gender = $faker->randomElement(['male', 'female']);
            if ($count == 1) {
                $status = 'admin';
            } else {
                $status = 'member';
            }
            User::create([
                'name' => $faker->name($gender),
                'email' => $faker->email(),
                'password' => bcrypt($faker->password()),
                'username' => $faker->userName(),
                'status' => $status,
            ]);
            $count++;
        }
    }
}
