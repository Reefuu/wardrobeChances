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

        // $faker = Factory::create();

        // $count = 1;
        // while ($count <= 10) {
        //     $gender = $faker->randomElement(['male', 'female']);
        //     if ($count == 1) {
        //         $status = 'admin';
        //     } else {
        //         $status = 'member';
        //     }
        //     User::create([
        //         'name' => $faker->name($gender),
        //         'email' => $faker->email(),
        //         'password' => bcrypt("password"),
        //         'username' => $faker->userName(),
        //         'status' => $status,
        //     ]);
        //     $count++;
        // }

        User::create([
            'name' => 'Admin',
            'email' => 'admin@wdchances',
            'password' => bcrypt('wdchances'),
            'username' => 'adminwdchances',
            'status' => 'admin'
        ]);

        User::create([
            'name' => 'Member',
            'email' => 'member@wdchances',
            'password' => bcrypt('wdchances'),
            'username' => 'memberwdchances',
            'status' => 'member'
        ]);
    }
}
