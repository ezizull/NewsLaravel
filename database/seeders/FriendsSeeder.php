<?php

namespace Database\Seeders;

use App\Models\Friends;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class FriendsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i <= 3; $i++){
            Friends::create([
                'firstname' => $faker->firstName(),
                'lastname' => $faker->boolean() ? $faker->lastName() : '',
                'phone' => $faker->boolean() ? $faker->numerify('####-####-####') : ''
            ]);
        }
    }
}
