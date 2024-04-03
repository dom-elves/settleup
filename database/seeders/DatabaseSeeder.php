<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Group;
use App\Models\Debt;
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

        User::factory()->create([
            'first_name' => 'Dom',
            'last_name' => 'Elves',
            'email' => 'dom_elves@hotmail.co.uk',
            'password' => 'password',
        ]);

        for ($i = 0; $i < 100; $i++) {
            User::factory()->create([
                'first_name' => $faker->unique()->firstName,
                'last_name' => $faker->unique()->country,
            ]);
        }
        
        for ($i = 0; $i < 10; $i++) {
            $group = Group::factory()->create([
                'user_ids' => json_encode(User::pluck('id')
                    ->shuffle()
                    ->take(random_int(2,10))
                    ->toArray()),
            ]);

            $decimal = round(100 / random_int(100,1000), 2);

            Debt::factory()->create([
                'group_id' => $group->id,
                'amount' => random_int(1, 999) + $decimal,
            ]);
        }



        
    }
}
