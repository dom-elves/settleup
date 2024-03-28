<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Group;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            User::factory()->create([
                'first_name' => $faker->unique()->firstName,
                'last_name' => $faker->unique()->country,
            ]);
        }
        
        for ($i = 0; $i < 2; $i++) {
            Group::factory()->create([
                'user_ids' => json_encode(User::pluck('id')->shuffle()->take(5)->toArray()),
            ]);
        }

        
    }
}
