<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DJ;

class DjSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DJ::create([
            'user_id' => 1, // Replace with the desired user_id
            'djname' => 'Carl Cox',
            'image' => 'uploads/weKbrQ9lUlCLshH0Ed42ZidEnQwnBky7fbm5JguS.jpg', // Replace with the actual image path
            'town' => 'London',
            'country' => 'England',
            'genre' => 'Techno',
            'description' => 'Oh yes, oh yes!!',
            'social' => 'www.carlcox.com', // You can store multiple links as a string
            'date' => '1981-02-02', // You can adjust the date as needed
        ]);

        DJ::create([
            'user_id' => 2, // Replace with the desired user_id
            'djname' => 'Charlotte De Witte',
            'image' => 'uploads/weKbrQ9lUlCLshH0Ed42ZidEnQwnBky7fbm5JguS.jpg', // Replace with the actual image path
            'town' => 'Brussels',
            'country' => 'Belgium',
            'genre' => 'Techno',
            'description' => 'Hard Techno',
            'social' => 'www.cdw.com', // You can store multiple links as a string
            'date' => '1991-02-02', // You can adjust the date as needed
        ]);
    }
}
