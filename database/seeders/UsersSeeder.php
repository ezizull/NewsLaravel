<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@email.com',
            'password' => bcrypt('12345678'),
            'is_admin' => '1',
        ]);
        User::create([
            'name' => 'user',
            'email' => 'user@email.com',
            'password' => bcrypt('user1234'),
        ]);
    }
}
