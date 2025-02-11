<?php

namespace Database\Seeders;

use App\Models\Todo;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        
        foreach (range(1, 10) as $index) {
            Todo::create([
                'user_id' => $faker->randomElement([1, 2]),
                'title' => $faker->sentence,
                'description' => $faker->paragraph,
                'due_time' => $faker->dateTimeBetween('now', '+1 month')->format('Y-m-d H:i'),
                'is_done' => $faker->boolean,
                'is_email_sent' => $faker->boolean,
            ]);
        }
    }
}
