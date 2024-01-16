<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(['name' => 'Kev', 'email' => 'kev@gmail.com', 'town' => 'Glengormley', 'Country' => 'Ireland', 'username' => 'Kevster', 'password' => bcrypt('password'), 'isAdmin' => 1]);
    }
}
