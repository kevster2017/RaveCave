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
        User::create(['name' => 'Kev', 'image' => 'images/profileImage.jpg', 'email' => 'kev@gmail.com', 'town' => 'Glengormley', 'Country' => 'Ireland', 'username' => 'Kevster', 'password' => bcrypt('password'), 'isAdmin' => 1]);

        User::create(['name' => 'Eric', 'image' => 'images/profileImage.jpg', 'email' => 'Eric@gmail.com', 'town' => 'Glengormley', 'Country' => 'Ireland', 'username' => 'Ericster', 'password' => bcrypt('password'), 'isAdmin' => 0]);

        User::create(['name' => 'Luna', 'image' => 'images/profileImage.jpg', 'email' => 'luna@gmail.com', 'town' => 'Glengormley', 'Country' => 'Ireland', 'username' => 'Lunster', 'password' => bcrypt('password'), 'isAdmin' => 1]);

        User::create(['name' => 'Mel', 'image' => 'images/profileImage.jpg', 'email' => 'mel@gmail.com', 'town' => 'Glengormley', 'Country' => 'Ireland', 'username' => 'Melster', 'password' => bcrypt('password'), 'isAdmin' => 1]);
    }
}
