<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Event::create([
            'userID' => 1, // Replace with the desired userID
            'dj' => 'Carl Cox', // Replace with the actual DJ name
            'image' => 'uploads/i2OQF4dudttRmsMiLEtTPvub5zkbt3Gqqqi5oUv1.jpg', // Replace with the actual image path
            'video' => '/tmp/phpqDddax', // Replace with the actual video path
            'title' => 'Tomorrowland',
            'date' => '2024-01-26', // You can adjust the date as needed
            'time' => '20:00:00', // You can adjust the time as needed
            'description' => 'Massive night ahead',
            'price' => 5, // Replace with the actual price
        ]);

        Event::create([
            'userID' => 1, // Replace with the desired userID
            'dj' => 'Sven Vath', // Replace with the actual DJ name
            'image' => 'uploads/oFbTKdh7RjXQOMnguyciaM8oCr4R2gHLof17bwr7.png', // Replace with the actual image path
            'video' => '/tmp/phpIdmKOO', // Replace with the actual video path
            'title' => 'Lunanosity',
            'date' => '2024-01-27', // You can adjust the date as needed
            'time' => '23:20:00', // You can adjust the time as needed
            'description' => 'Even bigger night ahead',
            'price' => 5, // Replace with the actual price
        ]);

        Event::create([
            'userID' => 1, // Replace with the desired userID
            'dj' => 'Ritchie Hawtin', // Replace with the actual DJ name
            'image' => 'uploads/BZZb9LDXe9HKLvO8N3irbUBluuugbOpR0awj7Zbp.jpg', // Replace with the actual image path
            'video' => '/tmp/phpZvpABw', // Replace with the actual video path
            'title' => 'Shine',
            'date' => '2024-01-27', // You can adjust the date as needed
            'time' => '22:10:00', // You can adjust the time as needed
            'description' => 'Brilliant night ahead',
            'price' => 5, // Replace with the actual price
        ]);

        Event::create([
            'userID' => 1, // Replace with the desired userID
            'dj' => 'Nina Kravitz', // Replace with the actual DJ name
            'image' => 'uploads/Uk8NM8TotXR8GOQ8XjvUPaZ7C4AOyLFnsTYJe0Qq.jpg', // Replace with the actual image path
            'video' => 'uploads/4TK2Y213R7uLzTmxBT4mRsNyBsCmlbgOYkIjdd4e.mp4', // Replace with the actual video path
            'title' => 'Xmas Shine',
            'date' => '2024-01-28', // You can adjust the date as needed
            'time' => '22:00:00', // You can adjust the time as needed
            'description' => 'Birthday party',
            'price' => 5, // Replace with the actual price
        ]);
    }
}
